<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Article::all()->sortByDesc(Article::UPDATED_AT);
        $data = ['list' => $list];
        return view('admin.article.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //todo check
        $article = new Article();
        $article->title = $request->title;
        $article->content = $request->content;
        $status = $article->save() ? 200 : 500;
        $msg = $status == 200 ? 'Success' : 'failed';
        return response()->json(['status' => $status, 'msg' => $msg]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        $data = [
            'title'   => $article->title,
            'content' => $article->content,
        ];
        return resAjax(200, '', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('admin.article.edit', ['id' => $article->id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $article->title = $request->title;
        $article->content = $request->content;
        $status = $article->save() ? 200 : 500;
        $msg = $status == 200 ? 'Success' : 'failed';
        return resAjax($status, $msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return response()->json(['status' => 200, 'data' => 'ok']);
    }
}
