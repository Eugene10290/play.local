<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Requests\BlogRequest;
use Illuminate\Contracts\Filesystem\Factory;
use Illuminate\Support\Facades\Storage;
use App\Role;
use App\Permission;

use Auth;

use Image;

class BlogController extends Controller
{
    public function __construct(Factory $factory)
    {
        $this->factory = $factory;
        $this->middleware('auth');
        $this->middleware('permission:blog-create',
            ['only' => ['create','store']]);
        $this->middleware('permission:blog-edit',
            ['only' => ['edit', 'update','index']]);
        $this->middleware('permission:blog-delete',
            ['only' => 'destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = Blog::latest()
            ->published()
            ->paginate(10);

        return view('blog.index', compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = \App\Tag::pluck('name', 'id'); // передаёт id тэга
        return view('blog.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogRequest $request)
    {
        $blog = $this->createBlogArticle($request);
        $tags = $request->input('tag_list');
        $this->validateNewTag($tags, $blog);

        return redirect()->route('blog.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blogs
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        return view('blog.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tags = Tag::pluck('name', 'id');
        $blog = Blog::findOrFail($id);

        return view('blog.edit', compact('blog', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);
        $tags = $request->input('tag_list');
        $input = $this->imageArticleRequest($request);

        if($input !== null) {
            $old_image = $blog->wall;
            $disk = $this->factory->disk('uploads'); //config->filesystems
            $disk->delete('/blogImages/' . $old_image);
            $blog->update($input);
        }else {
            $blog->update($request->all());
        }

        $this->validateNewTag($tags, $blog);


        return redirect('blog/'.$blog->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $oldImage = $blog->wall;
        $disk = $this->factory->disk('uploads');
        $disk->delete('/blogImages/' . $oldImage);
        $blog->delete();

        return redirect()->back();
    }

    /**
     * Отделяет новые тэги от уже созданных и применяет к статье
     *
     * @param $tags
     * @param $blog
     * @return bool
     */
    private function validateNewTag($tags, $blog) {
        $newTag = new Tag();
        foreach ($tags as $key => $value) {
            if( !ctype_digit($value) ) { //Новые тэги
                $newTag->name = $value;
                $newTag->save();
            }else{
                $oldTags = $value; //Старые тэги
            }
            if( !isset($oldTags) ) { //Если старых тэгов нет, то создаём и применяем новые
                $this->syncTags($blog, $newTag);
            }else {
                $this->syncTags($blog, $oldTags);
            }
        }
        $blog->tags()->attach($newTag->id);

        return true;
    }
    /**
     * Создание новой статьи и применение к ней тэгов
     *
     * @param $request
     * @return mixed
     */
    private function createBlogArticle($request) {
        $input = $this->imageArticleRequest($request);
        $blog = Auth::user()->blog()->create($input);

        return $blog;
    }

    /**
     * Синхронизирует список тэгов в базе данных .
     *
     * @param Request $request
     * @param Blog $blog
     */
    private function syncTags(Blog $blog, $tags) {
        $blog->tags()->sync($tags);
    }

    /**
     * Функция обрезки и загрузки изображения для статьи, генерации слага
     *
     * @param $request
     * @return array
     */
    protected function imageArticleRequest($request) {
        if ($request->hasFile('wall')) {
            $image = $request->file('wall');
            $imageName = time() . "." . $image->getClientOriginalExtension();
            $savePath = public_path('images/uploads/blogImages/' . $imageName);
            Image::make($image)
                ->save($savePath);
            $input = $request->all();
            $input = array_except($input, 'pathName');
            $input['wall'] = $imageName;
            $title = $input['title'];
            $input['slug'] = str_slug($title);

            return $input;
        }
    }

}
