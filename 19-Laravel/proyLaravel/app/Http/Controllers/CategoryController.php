<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\CategoryRequest;


use App\Exports\CategoriesExport;
use App\Imports\CategoriesImport;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$categories = Category::all();
        $categories = Category::paginate(3);
        return view('categories.index')->with('categories', $categories);
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        //dd($request->all());
        $category = new Category;
        $category->name  = $request->name;
        $category->description  = $request->description;
        if ($request->hasFile('image')) {
        $file = time().".".$request->image->extension();
        $request->image->move(public_path('imgs'), $file);
        $category->image = 'imgs/'.$file;
        }

         if($category->save()) {
          return redirect('categories')->with('message', 'La categoria: '.$category->name.' fue adicionada con exito');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);
        //dd($user);
        return view('categories.show')->with('category', $category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        //dd($category);
        return view('categories.edit')->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        //dd($request->all());
        $category = Category::find($id);
        $category->name  = $request->name;
        $category->description  = $request->description;
        if ($request->hasFile('image')) {
        $file = time().".".$request->image->extension();
        $request->image->move(public_path('imgs'), $file);
        $category->image = 'imgs/'.$file;
        }
         if($category->save()) {
           return redirect('categories')->with('message', 'La Categoria: '.$category->name.' fue actualizada con exito');
             }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        if($category->delete()){
            return redirect('categories')->with('message', 'La categoria: '.$category->name. 'fue eliminada con exito!');
        }
    } 
    public function search(Request $request) {
        $categories = Category::names($request->q)->orderBy('id','ASC')->paginate(3);
        return view('categories.search')->with('categories', $categories);
    }
    public function pdf() {
        //dd('Descargar PDF');
        $categories =  Category::all();
        $pdf = \PDF::loadView('categories.pdf', compact('categories'));
        return $pdf->download('allcategories.pdf');
    }

    public function excel() {
        return \Excel::download(new CategoriesExport, 'allcategories.xlsx');
    }


    public function import(Request $request) {
        // $this->validate($request, [
        //     'file' => 'required|file|mimes:xls, xlsx'
        // ]);
        $file = $request->file('file');
        \Excel::import(new CategoriesImport, $file);
        return redirect()->back()->with('message', 'Las categorias se importaron con exito!');
    }
}
