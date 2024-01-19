<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ChangePasswordRequest;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

use Illuminate\Auth\Events\PasswordReset;

use App\Models\User;

use App\Http\Controllers\Controller;

class AuthWebController extends Controller
{
    public function __construct() {
        auth()->shouldUse('web');
    }

    /*----------- VIEWS -----------*/
    public function login_view() {
        return view('auth.login');
    }

    public function profile_view() {
        return view('admin.create', [
            'data' => auth()->user(),
            'path' => [
                ['name' => 'Perfil', 'path' => '/profile']
            ]
        ]);
    }

     /*----------- FUNCTIONS -----------*/
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
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);

        return redirect(route('admin.all'))->with('msg', 'Administrador criado com sucesso!');
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('login'));
    }

    public function reset_password(Request $request) {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
            'old_password' => 'required'
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET?
            view('auth.success-reset'):
            back()->withErrors(['generic' => __($status)])
        ;
    }
}
