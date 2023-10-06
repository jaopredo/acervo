<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

use Illuminate\Http\Request;
use App\Http\Requests\ChangePasswordRequest;

use App\Http\Resources\GenericResource;

class AuthController extends Controller
{
    public $model = User::class;
    public $page = 'admin';
    public $inputs = [
        'email',
        'password',
        'password_confirmation',
        'name'
    ];

    public $validator = [
        'email' => 'required',
        'password' => 'required',
        'password_confirmation' => 'required|same:password',
        'name' => 'required'
    ];

    public $resource = GenericResource::class;
    public $root_path = ['name' => 'Administradores', 'path' => '/admin'];

    public $filters = [
        [ 'name' => 'name', 'label' => 'Nome', 'operator' => 'like' ],
        [ 'name' => 'email', 'label' => 'Email', 'operator' => 'like' ],
    ];

    public function __construct()
    {
        $this->middleware('auth', ['except' => [
            'login',
            'login_view',
            'reset_password',
            'register'
        ]]);
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

    public function change_password(ChangePasswordRequest $request) {
        // Validando usuário
        $credentials = [
            'email' => $request->email,
            'password' => $request->old_password
        ];
        if (Auth::attempt($credentials)) {
            $user = User::where('email', '=', $request->email);
            $user->update([
                'password' => Hash::make($request->password)
            ]);

            return back()->with('msg', 'Senha alterada com sucesso!');
        } else {
            return back()->withErrors([
                'old_password' => 'Sua antiga senha está incorreta!'
            ]);
        }
    }
}
