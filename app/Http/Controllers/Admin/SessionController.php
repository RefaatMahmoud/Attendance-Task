<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class SessionController extends Controller
{
    public function create()
    {
        if(auth()->check()){
            return redirect()->route('home');
        }
        return view('login');
    }


    public function store()
    {
        if (!auth()->attempt(request(['email','password']))) {
            return redirect()->route('admin.login')->withErrors([
                'message' => 'email or password is invalid'
            ]);
        }
        return redirect()->home();
    }


    public function destroy()
    {
        auth()->logout();
        return redirect()->route('admin.login');
    }
}
