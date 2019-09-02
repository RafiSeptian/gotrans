<?php

namespace App\Http\Controllers;

use App\Notif;
use Illuminate\Http\Request;
use Auth;
use App\User;

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
        } else {

            $response = [
                'msg' => 'failed'
            ];
        }

        return response()->json($response);
    }

    public function getRegister()
    {
        return view('layouts.forms.register');
    }

    public function postRegister(Request $request)
    {
        $data = $request->all();

        $role = [
            'role_id' => 2
        ];

        array_push($data, $role);

        $data['password'] = bcrypt($request->password);

        $create = User::create($data);

        $notif = Notif::create([
            'user_id' => auth()->user()->id
        ]);

        return response()->json([
            'msg' => 'success'
        ]);
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('home');
    }
}
