<?php

namespace App\Interfaces;
interface AuthInterface
{
    public function attemptLogin(array $credentials, string $guard): bool;

    public function logout(string $guard);
}
