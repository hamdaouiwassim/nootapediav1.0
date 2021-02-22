<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
class APIController extends Controller
{
    //
    public function index(){
        $posts = Post::where('stat','published')->get();
        return response()->json($posts, 200,[], JSON_UNESCAPED_UNICODE);
    }
    public function categories(){
        $categories = Category::all();
        return response()->json($categories, 200,[], JSON_UNESCAPED_UNICODE);
    }
    public function post($id){
        $post = Post::find($id);
        return response()->json($post, 200,[], JSON_UNESCAPED_UNICODE);
    }
    public function categoriePosts($id){
        $cat = Category::find($id);
        return response()->json($cat->posts->where('stat','published'), 200,[], JSON_UNESCAPED_UNICODE);

    }
}
