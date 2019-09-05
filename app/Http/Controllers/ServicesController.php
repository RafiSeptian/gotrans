<?php

namespace App\Http\Controllers;

use App\Major;
use App\Services;
use App\User;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    // public function index()
    // {
    //     ambil user dan cari services
    //     $user = User::findOrFail(auth()->user()->id);

    //     return view('layouts.forms.services', compact('user'));
    // }

    public function update(Request $request, $id)
    {
        $services = Services::findOrFail($id);

        $services->update([
            'major' => $request->major
        ]);

        return response()->json([
            'msg' => 'updated'
        ]);
    }
}
