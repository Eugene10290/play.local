<?php

namespace App\Http\Controllers;
use App\Blog;

class IndexController extends Controller
{
    public function index(){
        $article = Blog::orderBy('id', 'DESC')->take(2)->get();

        return view('welcome', compact('article'));
    }
}
