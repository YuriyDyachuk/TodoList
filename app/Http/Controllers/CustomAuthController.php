<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\AuthService;
use App\Factories\AuthFactory;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Session;

class CustomAuthController extends Controller
{
    private AuthService $authService;
    private AuthFactory $authFactory;

    public function __construct(
        AuthService $authService,
        AuthFactory $authFactory
    ){
        $this->authService = $authService;
        $this->authFactory = $authFactory;
    }

    public function index()
    {
        return view('auth.login');
    }

    public function customLogin(AuthRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('todo')->withSuccess('Signed in');
        }

        return redirect("login")->withSuccess('Login details are not valid. Try again');
    }

    public function registration()
    {
        return view('auth.registration');
    }

    public function customRegistration(RegisterRequest $request)
    {
        $DTO = $this->authFactory->create($request);
        $this->authService->create($DTO);

        return redirect("todo")->withSuccess('You have signed-in');
    }

    public function signOut() {
        Session::flush();
        Auth::logout();

        return redirect('login');
    }
}