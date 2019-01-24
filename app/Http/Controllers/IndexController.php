<?php

namespace App\Http\Controllers;
use App\Blog;
use App\Product;

class IndexController extends Controller
{
    public function index(){
        $article = Blog::orderBy('id', 'DESC')->take(2)->get();
        $notes = Product::orderBy('id','DESC')->take(1)->get();

        return view('welcome', compact('article','notes'));
    }
}
