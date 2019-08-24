<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    public function getLogin()
    {
        return view('layouts.forms.login');
    }

    public function postLogin(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        $credentials = [
            'username' => $username,
            'password' => $password
        ];

        if (Auth::attempt($credentials)) {
            $response = [
                'msg' => 'success'
            ];
            return redirect()->route('home');
        } else {
            $response = [
                'msg' => 'failed'
            ];
        }

        // return response()->json($response);
    }

    public function getRegister()
    {
        return view('layouts.forms.register');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('home');
    }
}
