<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use App\Http\Requests\NewsRequest;
use Illuminate\Contracts\Filesystem\Factory;
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

    /**
     * Отображение отдельной новости
     *
     * @param News $news
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
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

    /**
     *
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(NewsRequest $request) {
        $input = $this->imageArticleRequest($request);
        Auth::user()->news()->create($input);

        return redirect('news');
    }

    /**
     * Отображение формы редактирования запмси
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id){
        $news = News::findOrFail($id);
        return view('news.edit', compact('news'));
    }

    public function update($id, NewsRequest $request) {
        $news = News::findOrFail($id);
        $input = $this->imageArticleRequest($request);
        if($input !== null) {
            $old_image = $news->news_wall;
            $disk = $this->factory->disk('images');
            $disk->delete('/newsImages/' . $old_image);
            $news->update($input);
        }else {
            $news->update($request->all());
        }

        return redirect('news/'.$news->slug);
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
