<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\News;

class NewsController extends Controller
{
    public function index()
    {
        $data = News::with(['comment'])->get();

        return view('pages.news', compact('data'));
    }

    public function show($slug)
    {
        $news = News::where('slug', $slug)->first();

        $comments = Comment::with(['user'])->where('news_id', $news->id)->get();

        return view('pages.detail_news', ['news' => $news, 'comments' => $comments]);
    }

    public function search(Request $request)
    {
        $news = News::where('title', 'LIKE', '%' . $request->q . '%')->get();

        return view('pages.result', compact('news'));
    }

    public function getComment($id)
    {
        $news = Comment::with(['user'])->orderBy('created_at', 'desc')->where('news_id', $id)->limit(1)->get();

        return response()->json($news);
    }

    public function postComment(Request $request)
    {
        $created = Comment::create([
            'user_id' => auth()->user()->id,
            'news_id' => $request->news_id,
            'content' => $request->content
        ]);

        return response()->json([
            'msg' => 'created'
        ]);
    }
}
