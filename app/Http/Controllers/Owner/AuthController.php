<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Interfaces\AuthInterface;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Laravel\Fortify\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    private AuthInterface $authRepository;

    public function __construct(AuthInterface $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function showLoginForm()
    {
        return Inertia::render('Auth/Owner/Login');
    }

    public function login(LoginRequest $request)
    {
        try {
            $credentials = $request->validated();
            if($this->authRepository->attemptLogin($credentials)) {
                $request->session()->regenerate();
                return redirect()->route('dashboard')->with('success', 'Login Success');
            }
            throw new \Exception("Login Failed");
        } catch (\Exception $e) {
            logger($e->getMessage());
            return back()->withErrors(['error' => 'Login Failed']);
        }
    }

    public function logout(Request $request)
     {
        $this->authRepository->logout('owner');
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/owner/login')->with('success', 'Logout Success!');
    }

}
