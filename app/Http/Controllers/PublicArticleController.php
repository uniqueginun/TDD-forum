<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Contracts\Support\Renderable;

class PublicArticleController extends Controller
{
    public function __invoke(Article $article): Renderable
    {
        return view('articles.public.show', [
            'article' => $article
        ]);
    }
}
