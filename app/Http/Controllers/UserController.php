<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeekerRegisterationRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use JetBrains\PhpStorm\NoReturn;

class UserController extends Controller
{
    public const JOB_SEEKER = 'seeker';

    public function createSeeker(): View
    {
        return view('user.seeker-register');
    }

    public function createEmployer(): View
    {
        return view('user.employer-register');
    }

    #[NoReturn] public function storeSeeker(SeekerRegisterationRequest $request): void
    {
        User::query()->create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'user_type' => self::JOB_SEEKER,
        ]);
    }

    public function login(): view
    {
        return view('user.login');
    }

    public function postLogin(Request $request): RedirectResponse|string
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/dashboard');
        }

        return "Wrong Email or Password";
    }

    public function logout(): RedirectResponse
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
