<?php

namespace App\Http\Controllers;
use App\Product;
use Image;
use Auth;
use Illuminate\Contracts\Filesystem\Factory;
use Illuminate\Http\Request;

class NotesController extends Controller
{

    public function __construct(Factory $factory)
    {
        $this->factory = $factory;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notes = Product::orderBy('id','desc')->get();

        return view('notes.index', compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->createNotes($request);

        return redirect('admin/notes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Отображение формы для редактирования нот
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('notes.edit', compact('product'));
    }

    /**
     * Обновление нот
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $input = $this->notesRequest($request);
        if(array_key_exists('wall',$input) === true){
            $oldWall = $product->wall;
            $disk = $this->factory->disk('uploads');
            $disk->delete('/notes/'.$oldWall);
            $product->update($input);
        }
        if(array_key_exists('pdf', $input) === true) {
            $oldPdf = $product->pdf;
            $disk = $this->factory->disk('notes');
            $disk->delete(''.$oldPdf);
            $product->update($input);
        }
        $product->update($input);

        return redirect('admin/notes')->with('success','Изменения внесены');
    }

    /**
     * Удаление товара и привязанного к нему изображения и pdf-файла
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $note = Product::findOrFail($id);
        $wall = $note->wall;
        $pdf = $note->pdf;
        $diskNotes = $this->factory->disk('notes');
        $diskImage = $this->factory->disk('uploads');
        $diskImage->delete('/notes/'.$wall);
        $diskNotes->delete('',$pdf);
        $note->delete();

        return redirect()->back();
    }

    /**
     * Создание нот
     *
     * @param $request
     * @return mixed
     */
    protected function createNotes($request) {
        $input = $this->notesRequest($request);
        $notes = Auth::user()->products()->create($input);

        return $notes;
    }

    /**
     * Формирование данных для заполнения бд, сохранение изображения и pdf файла
     *
     * @param $request
     * @return array
     */
    protected function notesRequest($request) {
        $input = $request->all();
        if($request->hasFile('wall')) {
            $image = $request->file('wall');
            $imageName = time() . "." . $image->getClientOriginalExtension();
            $savePath = public_path('images/uploads/notes/' . $imageName);
            Image::make($image)
                ->save($savePath);
            $input = array_except($input, 'pathName');
            $input['wall'] = $imageName;
        }
        if ($request->hasFile('pdf')) {
            $pdf = $request->file('pdf');
            if($pdf->getClientOriginalExtension() === 'pdf') {
                $pdfName = time(). '.'.$pdf->getClientOriginalExtension();
                $disk = $this->factory->disk('notes');
                $disk->putFileAs('',$request->file('pdf'),$pdfName);
                $disk->setVisibility(''.$pdfName,'private');
                $input['pdf'] = $pdfName;
            }
        }
        return $input;
    }
}
