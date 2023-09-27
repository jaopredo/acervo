<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

use Illuminate\Auth\Events\PasswordReset;

use Illuminate\Http\Request;

use App\Models\User;

class PasswordForgotController extends Controller
{
    public function __construct() {
        $this->middleware('guest');
    }

    /* ------------------- VIEWS ------------------- */
    public function forgot_password() {
        return view('auth.forgot-password');
    }

    public function password_form($token) {
        return view('auth.redefine-password', ['token' => $token]);
    }

    /* ------------------- ACTIONS ------------------- */
    public function send_email(Request $request) {
        $request->validate([
            'email' => 'required'
        ]);

        $email = $request->email;

        $message = Password::sendResetLink([ 'email'=> $email ]);

        if ($message != 'passwords.sent') {
            return back()->withErrors(['email' => __($message)]);
        }
        return back()->with('msg', __($message));
    }

    public function redefine_password(Request $request) {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed'
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
