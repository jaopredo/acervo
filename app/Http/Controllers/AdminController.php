<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ChangePasswordRequest;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Http\Resources\GenericResource;

class AdminController extends Controller
{
    public $model = User::class;
    public $page = 'admin';
    public $inputs = [
        'email',
        'password',
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
