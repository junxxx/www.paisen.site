<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class BlogController extends Controller
{
    //
    public function index()
    {
        $articles = Article::all()->sortByDesc('id');
        if ($articles) {
            foreach ($articles as &$article) {
                $article['content'] = strip_tags($article['content']);
                $article['content'] = strlen($article['content']) > 800 ? substr($article['content'], 0, 800) . '......' : $article['content'];
            }
            unset($article);
        }
        return view('blog.index', ['list' => $articles]);
    }

    public function detail(Article $article)
    {
        $article['content'] = (new \Parsedown())->text($article['content']);
        return view('blog.detail', ['article' => $article]);
    }
}
