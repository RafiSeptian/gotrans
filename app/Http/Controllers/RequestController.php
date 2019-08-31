<?php

namespace App\Http\Controllers;

use App\Request as Message;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function store(Request $request)
    {
        Message::create($request->all());

        return response()->json([
            'msg' => 'success'
        ]);
    }
}
