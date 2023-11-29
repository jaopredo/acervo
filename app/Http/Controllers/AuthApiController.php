<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ChangePasswordRequest;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Hash;

use App\Models\Student;

class AuthApiController extends Controller
{
    public function __construct() {
        auth()->shouldUse('api');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        $credentials = $request->only('email', 'password');

        $token = auth()->attempt($credentials);
        if (!$token) {
            return response()->json([
                'message' => 'Não autorizado',
            ], 401);
        }

        $user = auth()->user();
        return response()->json([
            'user' => $user,
            'authorisation' => [
                'token' => $token,
                'type' => 'bearer',
            ]
        ]);

    }

    public function register(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'cpf' => 'required',
            'registration' => 'required',
            'image' => 'nullable',
            'classroom_id' => 'required|exists:classrooms,id'
        ]);

        $user = Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'cpf' => $request->cpf,
            'registration' => $request->registration,
            'image' => $request->image,
            'classroom_id' => $request->classroom_id
        ]);

        $token = auth()->login($user);
        return response()->json([
            'message' => 'Usuário criado com sucesso!',
            'user' => $user,
            'authorisation' => [
                'token' => $token,
                'type' => 'bearer',
            ]
        ]);
    }

    public function logout()
    {
        auth()->logout();
        return response()->json([
            'message' => 'Deslogado com sucesso!',
        ]);
    }

    public function verify()
    {
        return response()->json([ 'message' => 'Verificado' ]);
    }

    public function change_password(ChangePasswordRequest $request) {

    }
}
