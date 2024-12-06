<?php

namespace App\Repositories;

use App\Interfaces\AuthInterface;
use Illuminate\Support\Facades\Auth;

class AuthRepository implements AuthInterface {
    public function attemptLogin(array $credentials, string $guard):bool
    {
        return Auth::guard($guard)->attempt($credentials);
    }
    public function logout(string $guard):void
    {
        Auth::guard($guard)->logout();
    }
}
