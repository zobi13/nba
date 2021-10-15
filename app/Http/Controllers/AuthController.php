<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function getRegisterForm()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->validated();

        $data['password'] = Hash::make($data['password']);
        
        $newUser = User::create($data);
        auth()->login($newUser);

        return redirect('/teams');
    }

    public function logout()
    {
        auth()->logout();

        return redirect('/login');
    }

    public function getLoginBlade()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ];

        if (auth()->attempt($credentials)) {
            return redirect('/teams');
        }

        return view('auth.login', ['invalid_credentials' => true]);
    }
}