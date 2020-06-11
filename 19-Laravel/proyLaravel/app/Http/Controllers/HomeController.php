<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Article;
use App\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['welcome','artsbycat']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->role == 'Admin') {
            return view('dashboard-admin');  
        } else if(Auth::user()->role == 'Editor') {
            return view('dashboard-editor'); 
        }
    }

    public function welcome() {
        $sliders = Article::where('slider', '=', 1)->get();
        $categories = Category::all();
        $articles = Article::all();
        return view('welcome')->with('sliders', $sliders)
                              ->with('categories', $categories)
                              ->with('articles', $articles);
    }

    public function artsbycat(Request $request) {
        if ($request->idcat == 0) {
            //all categories
            $categories = Category::all();
            $articles = Article::all();
            return view('artsbycat')->with('categories', $categories)->with('articles', $articles);
        } else {
            //By Category
            $category = Category::where('id', '=', $request->idcat)->first();
            $articles = Article::where('category_id', '=', $request->idcat)->get();
            return view('artsbycat')->with('category', $category)->with('articles', $articles);
        }
    }
}
