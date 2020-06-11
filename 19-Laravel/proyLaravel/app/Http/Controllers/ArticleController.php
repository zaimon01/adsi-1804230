<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;
use App\User;
use App\Category;
use App\Http\Requests\ArticleRequest;

use App\Exports\ArticlesExport;
use App\Imports\ArticlesImport;
use Auth;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::paginate(20);
        return view('articles.index')->with('articles', $articles);
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
        $users =User::where('role', '=', 'Editor')->get();
        $categories = Category::all();
        return view('articles.create')->with('users', $users)->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        $article = new Article;
        $article->title = $request->title;
        $article->content = $request->content;
        $article->user_id = $request->user_id;
        $article->category_id = $request->category_id;
        $article->slider = $request->slider;
        $article->price = $request->price;

         if ($request->hasFile('image')) {
        $file = time().".".$request->image->extension();
        $request->image->move(public_path('imgs'), $file);
        $article->image = 'imgs/'.$file;
        }

         if($article->save()) {
          return redirect('articles')->with('message', 'El articulo: '.$article->title.' fue adicionado con exito');
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
        $article = Article::find($id);
        return view('articles.show')->with('article', $article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);
        $users = User::where('role', '=', 'Editor')->get();
        $categories = Category::all();
        return view('articles.edit')->with('article', $article)->with('users', $users)->with('categories', $categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, $id)
    {
        $article = Article::find($id);
        $article->title = $request->title;
        $article->content = $request->content;
        $article->user_id = $request->user_id;
        $article->category_id = $request->category_id;
        $article->slider = $request->slider;
        $article->price = $request->price;

         if ($request->hasFile('image')) {
        $file = time().".".$request->image->extension();
        $request->image->move(public_path('imgs'), $file);
        $article->image = 'imgs/'.$file;
        }

         if($article->save()) {
          return redirect('articles')->with('message', 'El articulo: '.$article->title.' fue modificado con exito');
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
        $article = Article::find($id);
        if($article->delete()){
            return redirect('articles')->with('message', 'El articulo: '.$article->title. 'fue eliminado con exito!');
        }
    }
     public function search(Request $request) {
        $articles = Article::names($request->q)->orderBy('id','ASC')->paginate(3);
        return view('articles.search')->with('articles', $articles);
    }
    public function pdf() {
        //dd('Descargar PDF');
        $articles =  Article::all();
        $pdf = \PDF::loadView('articles.pdf', compact('articles'));
        return $pdf->download('allarticles.pdf');
    }

    public function excel() {
        return \Excel::download(new ArticlesExport, 'allarticles.xlsx');
    }


    public function import(Request $request) {
        // $this->validate($request, [
        //     'file' => 'required|file|mimes:xls, xlsx'
        // ]);
        $file = $request->file('file');
        \Excel::import(new ArticlesImport, $file);
        return redirect()->back()->with('message', 'Los articulos se importaron con exito!');
    }
    public function myarticles(){
        $articles = Article::where('user_id', '=', Auth::user()->id)->paginate(20);
        return view('editor.index')->with('articles', $articles);
    }
    public function edtcreate(){
        $categories = Category::all();
        return view('editor.create')->with('categories', $categories);
    }
    public function edtstore(ArticleRequest $request) {
        $article = new Article;
        $article->title = $request->title;
        $article->content = $request->content;
        $article->user_id = Auth::user()->id;
        $article->category_id = $request->category_id;
        $article->slider = $request->slider;
        $article->price = $request->price;

         if ($request->hasFile('image')) {
        $file = time().".".$request->image->extension();
        $request->image->move(public_path('imgs'), $file);
        $article->image = 'imgs/'.$file;
        }

         if($article->save()) {
          return redirect('myarticles')->with('message', 'El articulo: '.$article->title.' fue adicionado con exito');
        }
    }
    public function edtshow($id){
        $article = Article::find($id);
        return view('editor.show')->with('article', $article);
    }
     public function edtedit($id)
    {
        $article   = Article::find($id);
        $categories  = Category::all();
        return view('editor.edit')->with('article', $article)
                                    ->with('categories', $categories);
    }
      public function edtupdate(ArticleRequest $request, $id)
    {
        $article = Article::find($id);
        $article->title       = $request->title;
        $article->content     = $request->content;
        $article->user_id     = Auth::user()->id;
        $article->category_id = $request->category_id;
        $article->slider      = $request->slider;
        $article->price       = $request->price;
        
        if ($request->hasFile('image')) {
            $file = time().'.'.$request->image->extension();
            $request->image->move(public_path('imgs'), $file);
            $article->image = 'imgs/'.$file;
        }

        if($article->save()) {
            return redirect('myarticles')->with('message', 'El Artículo: '.$article->title.' fue modificado con Exito!');
        }
    }
    public function edtdestroy($id) {
        $article = Article::find($id);
        if($article->delete()) {
            return redirect('myarticles')->with('message','El Articulo: '.$article->title.'fue eliminado con exito!');
        }
    }
}
