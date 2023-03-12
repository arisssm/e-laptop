<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {

        return view('auth.login');
    }

    public function loginProses(Request $request)
    {
        // return $request;

        $request->validate(
            [
                'email' => 'required',
                'password' => 'required',
            ],
            [
                'email.required' => 'silahkan masukkan email!',
                'password.required' => 'silahkan masukkan password!',
            ]
        );

        $credential_email = [
            'email' => $request->email,
            'password' =>$request->password,
        ];

        $credential_username = [
            'email' => $request->email,
            'password' =>$request->password,
        ];

        if(Auth::attempt($credential_email) || Auth::attempt($credential_username))
        {
            return redirect('/')->with('success', 'Login berhasil !');
        }else{
            return redirect()->back();
        }
    }

    public function register()
    {

        return view('auth.register');
    }

    public function registerStore(Request $request)
    {
        // return $request;

        $request->validate(
            [
                'email' => 'required|email|unique:users',
                'username' => 'required|unique:users,name',
                'password' => 'required',
                'confirm_password' => 'required|same:password',
            ],
            [
                'email.required' => 'silahkan input email',
                'email.unique' => 'email telah terdaftar',
                'username.required' => 'silahkan input username',
                'username.unique' => 'username telah terdaftar',
                'confirm_password.same' => 'password salah, password harus sama!',
            ]
        );

        User::create([
            'email' => $request->email,
            'name' => $request->username,
            'password' => Hash::make($request->confirm_password)
        ]);

        return redirect('/login');
    }

    public function logout(){
        Auth::logout();

        return redirect('/login');
    }
}
