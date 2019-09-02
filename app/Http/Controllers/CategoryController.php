<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($name)
    {
        $data = Category::with(['news'])->where('name', $name)->first();

        return view('pages.category', compact('data'));
    }
}
