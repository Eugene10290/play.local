<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Auth;
use Image;

class NewsController extends Controller
{

    /**
     * Отображение новоcтей
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {
        $news = News::latest()
            ->published()
            ->paginate(10);

        return view('news.index', compact('news'));
    }

    public function show(News $news) {
        return view('news.show', compact('news'));
    }

    /**
     * Отображение формы создания новостей
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create() {
        return view('news.create');
    }

    public function store(Request $request) {
        if($request->isMethod('post')){
            $rules = [
                'title' => 'required|min:5|max:50',
                'body' => 'required|min:20'
            ];
            $this->validate($request, $rules);
            $input = $this->imageArticleRequest($request);
            Auth::user()->news()->create($input);
            return redirect('news');
        }
    }
    /**
     * Функция обрезки и загрузки изображения для статьи, генерации слага
     *
     * @param $request
     * @return array
     */
    protected function imageArticleRequest($request) {
        if ($request->hasFile('news_wall')) {
            $image = $request->file('news_wall');
            $imageName = time() . "." . $image->getClientOriginalExtension();
            $savePath = public_path('images/uploads/newsImages/' . $imageName);
            Image::make($image)
                ->save($savePath);
            $input = $request->all();
            $input = array_except($input, 'pathName');
            $input['news_wall'] = $imageName;
            $title = $input['title'];
            $input['slug'] = str_slug($title);
            return $input;
        }
    }


}
