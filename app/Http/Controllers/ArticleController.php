<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Article::class, 'article');
    }

    public function index()
    {
        // 全カテゴリーを取得
        $categories = Category::all();

        $articles = [];

        // 各カテゴリーをキー、記事配列を値にした連想配列を作成（[カテゴリ => [記事配列]]）
        foreach ($categories as $category) {
            $articles[$category->name] = Article::where(
                'category_id', $category->id
            )->orderBy('created_at', 'desc')->get();
        }

        return view('articles.index', ['articles' => $articles]);
    }

    public function show(Article $article)
    {
        return view('articles.show', ['article' => $article]);
    }

    public function create()
    {
        $categories = Category::all();

        return view('articles.create', ['categories' => $categories]);
    }

    public function store(ArticleRequest $request, Article $article)
    {
        // 新規投稿を作成
        $article->fill($request->all());
        $article->thumbnail = $request->thumbnail->store('', 'public');
        $article->user_id = $request->user()->id;

        // 新規投稿を保存
        $article->save();

        return redirect()->route('articles.index');
    }

    public function edit(Article $article)
    {
        $categories = Category::all();

        return view('articles.edit', [
            'article' => $article,
            'categories' => $categories,
        ]);
    }

    public function update(ArticleRequest $request, Article $article)
    {
        // 編集した投稿を作成
        $article->fill($request->all());
        $article->thumbnail = $request->thumbnail->store('', 'public');
        // 編集した投稿を保存
        $article->save();

        return redirect()->route('articles.show', ['article' => $article]);
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('articles.index');
    }

    public function like(Request $request, Article $article)
    {
        $article->likes()->detach($request->user()->id);
        $article->likes()->attach($request->user()->id);

        return redirect()->back();
    }

    public function unlike(Request $request, Article $article)
    {
        $article->likes()->detach($request->user()->id);

        return redirect()->back();
    }
}
