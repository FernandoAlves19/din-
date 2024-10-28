<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Family extends Model
{
    use Notifiable;
    protected $table = "family";

    protected $fillable = ['id','name','created_at','updated_at'];

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
