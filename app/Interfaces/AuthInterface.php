<?php

namespace App\Interfaces;
interface AuthInterface
{
    public function attemptLogin(array $credentials): bool;

    public function logout(string $guard);
}
