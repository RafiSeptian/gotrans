<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class NewsController extends Controller
{
    public function index()
    {
        $data = News::all();

        return view('pages.news', compact('data'));
    }

    public function show($slug)
    {
        $news = News::where('slug', $slug)->first();

        return view('pages.detail_news', compact('news'));
    }

    public function search(Request $request)
    {
        $news = News::where('title', 'LIKE', '%' . $request->q . '%')->get();

        return view('pages.result', compact('news'));
    }
}
