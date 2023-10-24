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
        auth()->shouldUse('jwt');
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
                'status' => 'error',
                'message' => 'Unauthorized',
            ], 401);
        }

        $user = auth()->user();
        return response()->json([
            'status' => 'success',
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
            'status' => 'success',
            'message' => 'User created successfully',
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
            'status' => 'success',
            'message' => 'Successfully logged out',
        ]);
    }

    // public function refresh()
    // {
    //     return response()->json([
    //         'status' => 'success',
    //         'user' => auth()->user(),
    //         'authorisation' => [
    //             'token' => auth()->refresh(),
    //             'type' => 'bearer',
    //         ]
    //     ]);
    // }

    public function change_password(ChangePasswordRequest $request) {

    }
}
