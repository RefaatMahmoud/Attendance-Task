<?php

namespace App\Repositories;

use App\User;

class UserRepository implements RepositoryInterface
{
    public function all($data)
    {
        return User::all();
    }

    public function findByEmail($email)
    {
        return User::where('email',$email)->first();
    }

    public function store($data)
    {
        return User::create([
            'email'    => $data['email'],
            'password' => bcrypt($data['password'])
        ]);
    }
}
