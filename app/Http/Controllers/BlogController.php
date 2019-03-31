<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class BlogController extends Controller
{
    //
    public function index()
    {
        $blogs = Article::all();
        return view('blog.index', ['list' => $blogs]);
    }

    public function detail(Article $article)
    {
        return view('blog.detail', ['article' => $article]);
    }
}
