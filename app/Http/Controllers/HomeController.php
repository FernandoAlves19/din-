<?php

namespace App\Http\Controllers;

use App\Category;
use App\Family;
use App\Transaction;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\TransactionRequest;
use App\User;
use Illuminate\Contracts\Database\Eloquent\Builder;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $family = Family::where('id',auth()->user()->family_id)->first();
        if(!is_null($family))
        {
        $users = User::where('family_id', $family->id)->get();
        $user1 = $users[0]->id;
        $user2 = $users[1]->id;
    }else{
        $user1 = auth()->user()->id;
        $user2 = 0;
    }

        $month = empty($request->get('month')) ? date('m') : $request->get('month');
        $year = empty($request->get('year')) ? date('Y') : $request->get('year');

        $transactions = Transaction::whereIn('user_id', [$user1 , $user2])->whereMonth('date', $month)->whereYear('date', $year)->orderBy('date')->get();
        // dd($transactions, $month, $year);
        $categories = Category::where('user_id', auth()->user()->id)->orWhere('user_id', $user2)->latest()->get();

        $month_zero = Transaction::whereIn('user_id', [$user1 , $user2])->whereMonth('date', $month)->whereYear('date', $year)->whereType(0)->sum('value');
        $month_one = Transaction::whereIn('user_id', [$user1 , $user2])->whereMonth('date', $month)->whereYear('date', $year)->whereType(1)->sum('value');

        $year_zero = Transaction::whereIn('user_id', [$user1 , $user2])->whereYear('date', $year)->whereType(0)->sum('value');
        $year_one = Transaction::whereIn('user_id', [$user1 , $user2])->whereYear('date', $year)->whereType(1)->sum('value');

        $all_zero = Transaction::whereIn('user_id', [$user1 , $user2])->whereType(0)->sum('value');


        $all_one = Transaction::where('user_id', $user1)->whereType(1)->sum('value');

        // dd($month, $year, $transactions, $categories, $month_zero, $month_one, $year_zero, $year_one, $all_zero, $all_one);

        return view('home', compact('transactions', 'categories', 'month_zero', 'month_one', 'year_zero', 'year_one', 'all_zero', 'all_one'));
    }

    public function storeCategory(CategoryRequest $request)
    {
        $category = new Category;
        $category->user_id = auth()->user()->id;
        $category->name = $request->name;
        $category->save();

        return redirect()->back()->with('success', 'Categoria adicionada!');
    }

    public function storeTransaction(TransactionRequest $request)
    {
        $transaction = new Transaction();
        $transaction->user_id = auth()->user()->id;
        $transaction->category_id = $request->category_id;
        $transaction->type = $request->type;
        $transaction->date = $request->date;
        $transaction->description = $request->description;
        $transaction->value = str_replace(',', '.', $request->value);
        $transaction->save();

        return redirect()->back()->with('success', 'Transação adicionada!');
    }

    public function updateCategory(CategoryRequest $request, Category $category)
    {
        $category->user_id = auth()->user()->id;
        $category->name = $request->name;
        $category->save();

        return redirect()->back()->with('success', 'Categoria atualizada!');
    }

    public function updateTransaction(TransactionRequest $request, Transaction $transaction)
    {
        $transaction->user_id = auth()->user()->id;
        $transaction->category_id = $request->category_id;
        $transaction->type = $request->type;
        $transaction->date = $request->date;
        $transaction->description = $request->description;
        $transaction->value = str_replace(',', '.', $request->value);
        $transaction->save();

        return redirect()->back()->with('success', 'Transação atualizada!');
    }

    public function deleteCategory(Category $category)
    {
        try {
            $category->delete();

            return redirect()->back()->with('success', 'Categoria excluída!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('A categoria não pode ser excluída. Apenas categorias sem transações podem ser excluídas.');
        }
    }

    public function deleteTransaction(Transaction $transaction)
    {
        $transaction->delete();

        return redirect()->back()->with('success', 'Transação excluída!');
    }
}
