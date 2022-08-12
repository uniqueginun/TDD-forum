<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;

class WelcomeController extends Controller
{
    public function index(): Renderable
    {
        return view('welcome');
    }
}
