<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
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
}
