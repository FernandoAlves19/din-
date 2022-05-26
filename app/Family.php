<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    protected $table = "family";

    protected $fillable = ['id','name','created_at','updated_at'];

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
