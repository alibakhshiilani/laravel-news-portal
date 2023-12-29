<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use DefStudio\Telegraph\Models\TelegraphChat;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::with(["posts"])->get();
        return view('home',compact("categories"));
    }

    public function search(Request $request){
        $request->validate([
            "keyword"=>"required|string|min:3|max:50"
        ]);

        $posts = News::where("title","LIKE","%".$request->keyword."%");

        if($request->ajax()){
            return $posts->limit(5)->get();
        }

        $posts = $posts->limit(30)->get();

        return view("search",compact("posts"));
    }

    public function category($slug){
//        dd(1);
        $category = Category::with("posts")->where("slug",$slug)->first();

        return view("category",compact("category"));

    }
}
