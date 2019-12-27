<?php

namespace App\models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'name','pin_code','user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
