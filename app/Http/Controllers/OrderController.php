<?php

namespace App\Http\Controllers;

use App\Notif;
use App\Order;
use App\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $orders = Order::orderBy('created_at', 'desc')->where('transportation_id', auth()->user()->services->transportation_id)->where('status', 'waiting')->get();

        // return view('pages.order', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.forms.order');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $notif = Notif::where('transportation_id', $request->transportation_id)->first();
        // $user = Notif::where('user_id', auth()->user()->id)->first();

        // ambil user yang memiliki services === transportasi yang diminta

        $order = Order::create([
            'user_id' => auth()->user()->id,
            'transportation_id' => $request->transportation_id,
            'location_now' => $request->location_now,
            'location_target' => $request->location_target,
            'adult_passenger' => $request->adult_passenger,
            'children_passenger' => $request->children_passenger
        ]);

        $services = Services::with(['user'])->where('major', 'LIKE', '%' . $request->location_target . '%')->where('transportation_id', $request->transportation_id)->get();

        foreach ($services as $key) {
            $array = $key->user->id . ',';
            Notif::whereIn('user_id', [$array])->update([
                'is_read' => false
            ]);
        }

        // if (auth()->user()->role_id === 2) {
        //     if ($user !== null) {
        //         $user->update([
        //             'is_read' => false
        //         ]);
        //     } else {
        //         Notif::create([
        //             'user_id' => $request->user_id,
        //         ]);
        //     }
        // }

        // if (auth()->user()->role_id === 3) {
        //     if ($notif !== null) {
        //         $notif->update([
        //             'is_read' => false
        //         ]);
        //     } else {
        //         Notif::create([
        //             'transportation_id' => $request->transportation_id,
        //         ]);
        //     }
        // }
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
        $order = Order::findOrFail($id);

        $order->update([
            'services_id' => auth()->user()->services->id,
            'status' => 'taken'
        ]);

        return response()->json([
            'msg' => 'taken'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
