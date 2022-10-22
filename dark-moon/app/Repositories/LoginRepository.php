<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Auth;

class LoginRepository
{
    public function check()
    {
        $Auth = Auth::check();

        return $Auth;
    }
    public function login($Request)
    {
        $login = Auth::attempt([
            'email' => $Request->email,
            'password' => $Request->password,
        ],true);

        return $login;
    }
}
