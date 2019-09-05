<?php

namespace App\Http\Controllers;

use App\DetailDriver;
use App\Http\Requests\RegisterDriverRequest;
use App\Order;
use App\Services;
use Illuminate\Http\Request;
use App\User;
use PDF;
use Auth;
use Jenssegers\Date\Date as Date;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('custom_auth');
    }

    public function index()
    {
        // $user = User::findOrFail(auth()->user()->id);

        // return view('pages.profile', ['user' => $user]);
    }

    /**
     * Show the form for creating a new resource
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
    public function show($username)
    {
        $user = User::where('username', $username)->first();

        return view('pages.profile', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($username)
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

        $data = $request->all();

        $user = User::findOrFail($id);

        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }

        if ($request->file('avatar')) {
            $data['avatar'] = $request->file('avatar')->store('users');
        }

        $user->update($data);

        return response()->json([
            'msg' => 'updated'
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
        $user = User::findOrFail($id);

        $user->forceDelete();
        $user->delete();

        return redirect()->route('home');
    }

    public function profile($username)
    {
        $user = User::where('username', $username)->first();

        return view('layouts.partials.profile.profile', compact('user'));
    }

    public function setting()
    {
        $user = User::findOrFail(auth()->user()->id);

        return view('layouts.partials.profile.setting', compact('user'));
    }

    public function getChangeRole()
    {
        return view('layouts.forms.changerole');
    }

    public function postChangeRole(RegisterDriverRequest $request)
    {
        $time = Date::now()->format('FY');

        $user = User::findOrFail(auth()->user()->id);

        if ($request->hasFile('ktp')) {
            $ktp = $request->file('ktp')->store('detail-drivers/' . $time . '/');
        }
        if ($request->hasFile('sim')) {
            $sim = $request->file('sim')->store('detail-drivers/' . $time . '/');
        }
        if ($request->hasFile('stnk')) {
            $stnk = $request->file('stnk')->store('detail-drivers/' . $time . '/');
        }
        if ($request->hasFile('bpkb')) {
            $bpkb = $request->file('bpkb')->store('detail-drivers/' . $time . '/');
        }
        if ($request->hasFile('foto_kendaraan')) {
            $foto = $request->file('foto_kendaraan')->store('detail-drivers/' . $time . '/');
        }

        $change = $user->update([
            'role_id' => 3
        ]);

        DetailDriver::create([
            'user_id' => auth()->user()->id,
            'ktp' => $ktp,
            'sim' => $sim,
            'stnk' => $stnk,
            'bpkb' => $bpkb,
            'foto_kendaraan' => $foto,
            'plat_nomor' => $request->plat_nomor,
            'merk' => $request->merk
        ]);

        Services::create([
            'user_id' => auth()->user()->id,
            'transportation_id' => $request->transportation_id,
            'major' => $request->major
        ]);

        return response()->json([
            'msg' => 'created'
        ]);
    }

    public function history()
    {
        $user = User::findOrFail(auth()->user()->id);

        return view('layouts.partials.profile.history', compact('user'));
    }

    public function getHistory()
    {
        $orders = Order::with(['services', 'transportation'])->where('user_id', auth()->user()->id)->get();
        $pdf = PDF::loadView('pages.history', ['orders' => $orders]);
        return $pdf->download('riwayat_order.pdf');
    }
}
