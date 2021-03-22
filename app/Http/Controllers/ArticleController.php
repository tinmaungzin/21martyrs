<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Http\Requests\ArticleUpdateRequest;
use App\Models\Article;
use App\Utility\ImageModule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ArticleController extends Controller
{

    public function index()
    {
        $articles = Article::orderBy('id','desc')->paginate(5);
        return view('admin.article.index',compact('articles'));
    }


    public function create()
    {
        return view('admin.article.add');
    }


    public function store(ArticleRequest $request)
    {
        $data = $request->except('photo');
        if($request->has('photo'))
        {
            $path = Str::uuid() . '-' . $request->file('photo')->getClientOriginalName();
            $data['feature_image_url'] = ImageModule::uploadFromRequest('photo', $path);
        }
        Article::create($data);
        Session::flash('msg','New article created successfully!');
        return redirect(route('articles.index'));
    }


    public function show(Article $article)
    {
        //
    }


    public function edit(Article $article)
    {
        return view('admin.article.edit',compact('article'));

    }


    public function update(ArticleUpdateRequest $request, Article $article)
    {
        $data = $request->except('photo');
        if($request->has('photo'))
        {
            $path = Str::uuid() . '-' . $request->file('photo')->getClientOriginalName();
            $data['feature_image_url'] = ImageModule::uploadFromRequest('photo', $path);
        }
        $article->update($data);
        Session::flash('msg',' Article updated successfully!');
        return redirect(route('articles.index'));
    }


    public function destroy(Article $article)
    {
        //
    }
}
