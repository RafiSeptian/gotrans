<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function __construct()
    {
        $this->middleware('isNotAdmin');
    }
    public function index()
    {
        $news = News::with(['comment', 'category'])->orderBy('created_at', 'desc')->limit(3)->get();

        return view('home', compact('news'));
    }
}
