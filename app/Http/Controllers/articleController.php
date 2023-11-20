<?php

namespace App\Http\Controllers;

use App\Models\article;
use Illuminate\Http\Request;

class articleController extends Controller
{
    //
    public function index(){
        $articles = article::all();
        return view("articles",["articles"=>$articles]);
    }
    public function store(Request $request){
        $article = new article();
        $article->topic = "Hello world";
        $article->content = "lorem ipsum data hello world";

        $article->save();
        //return redirect("articles")->with("success","");
        echo "Insert Successful!";
    }
}
