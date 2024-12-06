<?php

namespace App\Http\Controllers\Member;

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
        return Inertia::render('Auth/Member/Login');
    }

    public function login(LoginRequest $request)
    {
        try {
            $credentials = $request->validated();
            if($this->authRepository->attemptLogin($credentials, 'member')) {
                $request->session()->regenerate();
                return redirect()->route('member.dashboard')->with('success', 'Login Success');
            }
            throw new \Exception("Login Failed");
        } catch (\Exception $e) {
            logger($e->getMessage());
            return back()->withErrors(['error' => 'Login Failed']);
        }
    }

    public function logout(Request $request)
    {
        $this->authRepository->logout('member');
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/member/login')->with('success', 'Logout Success!');
    }

}
