<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Contracts\Support\Renderable;

class WelcomeController extends Controller
{
    public function index(): Renderable
    {
        return view('welcome', [
            'articles' => Article::query()->latest()->get()
        ]);
    }
}
