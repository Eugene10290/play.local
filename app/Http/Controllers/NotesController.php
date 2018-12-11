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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
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
        if ($request->hasFile('wall','pdf')) {
            $image = $request->file('wall');
            $pdf = $request->file('pdf');
            if($pdf->getClientOriginalExtension() === 'pdf') {
                $imageName = time() . "." . $image->getClientOriginalExtension();
                $pdfName = time(). '.'.$pdf->getClientOriginalExtension();
                $savePath = public_path('images/uploads/notes/' . $imageName);
                Image::make($image)
                    ->save($savePath);
                $disk = $this->factory->disk('notes');
                $disk->putFileAs('',$request->file('pdf'),$pdfName);
                $disk->setVisibility(''.$pdfName,'private');
                $input = $request->all(); //формирование вывода
                $input = array_except($input, 'pathName');
                $input['wall'] = $imageName;
                $input['pdf'] = $pdfName;

                return $input;
            }
        }
    }
}
