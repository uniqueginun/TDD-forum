<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function create(): Renderable
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {

        $valid = $request->validate([
            'title' => 'string|required',
            'body' => 'string|required'
        ]);

        try {

            $request->user()->articles()->create($valid);

            return back()->withSuccess('article created successfully');
        } 
        
        catch (Throwable $th) {
            
            report($th);

            return back()->withError('article wasn\'t created successfully');
        }
    }

    public function vote(Article $article)
    {
        return back();
    }
}
