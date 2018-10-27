<?php

namespace App\Http\Controllers;
use App\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    /**
     * Отображение статей, привязанных к определённому тэгу
     *
     * @param Tag $tag
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Tag $tag){
       $blog = $tag->blog()->get()->reverse();

        return view('blog.user.index', compact('blog'));
    }
}
