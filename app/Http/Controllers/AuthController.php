<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => [
            'login',
            'login_view',
            'reset_password',
            'register'
        ]]);
    }

    public function login_view() {
        return view('auth.login');
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect(route('dashboard'));
        }

        return back()->withErrors(['password' => 'Sua senha está incorreta.']);
    }

    public function register(Request $request) {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);

        Auth::login($user);

        return response($user);
    }
}
