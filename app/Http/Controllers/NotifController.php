<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notif;
use App\Order;

class NotifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drivers = Order::orderBy('created_at', 'desc')->where('transportation_id', auth()->user()->services->transportation_id)->where('status', 'waiting')->get();

        $users = Order::orderBy('created_at', 'desc')->where('user_id', auth()->user()->id)->get();

        return view('pages.order', ['drivers' => $drivers, 'users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // if (auth()->user()->role_id === 3) {
        //     $notif = Notif::where('transportation_id', $id)->first();
        //     $notif->update([
        //         'is_read' => true
        //     ]);
        // } else {
        //     $notif = Notif::where('user_id', $id)->first();
        //     $notif->update([
        //         'is_read' => true
        //     ]);
        // }

        $notif = Notif::where('user_id', $id)->first();

        $notif->update([
            'is_read' => true
        ]);

        return response()->json([
            'msg' => 'deleted'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    { }
}
