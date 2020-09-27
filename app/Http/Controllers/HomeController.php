<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
class HomeController extends Controller
{
    public function index(){
      $comments =Comment::all();
      return view("home", ["comments"=>$comments]);
    }
    public function add(Request $request){
      $comment =$request->input("comment");
      Comment::create([
        "name"=>$request->name,
        "comment"=>$request->comment]);
        return redirect()->route("home");
    }
    public function getData(){
      $comments =Comment::orderBy("created_at", "desc")->get();
      $json =["comments"=>$comments];
      return response()->json($json);
    }
}
