<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Post;
use App\Category;
use App\User;
use Hash;
class DashboardController extends Controller
{
    //
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        if (Auth::user()->role == 'admin'){


            $posts = Post::all();
            $categories = Category::all();
            $users = User::all();
            return view('superuser.index')->with('posts',count($posts))->with('categories',count($categories))->with('users',count($users));
        }elseif (Auth::user()->role == 'editor'){
            $posts = Post::all();
            $categories = Category::all();
            $users = User::all();
            return view('editor.index')->with('posts',count($posts))->with('categories',count($categories))->with('users',count($users));
   
        }
    }

    public function posts(){

        
            if(Auth::user()->role == "admin"){
                $categories = Category::all();
                $posts = Post::where('stat','published')->get();
                return view('superuser.posts')->with('posts',$posts)->with('categories',$categories)->with('type','مقالات');
            }else{
                $categories = Category::all();
                $posts = Auth::user()->posts()->where('stat','published')->get();
                return view('editor.posts')->with('posts',$posts)->with('categories',$categories)->with('type','مقالات');
            }
    }
    public function postsSaved(){
        if(Auth::user()->role == "admin"){
            $categories = Category::all();
            $posts = Post::where('stat','saved')->get();
            return view('superuser.posts')->with('posts',$posts)->with('categories',$categories)->with('type','مسودات');
        }else{
            $categories = Category::all();
            $posts = Auth::user()->posts()->where('stat','saved')->get();
            return view('editor.posts')->with('posts',$posts)->with('categories',$categories)->with('type','مسودات');
        }

    }
    public function postsReviewed(){
        if(Auth::user()->role == "admin"){
            $categories = Category::all();
            $posts = Post::where('stat','reviewed')->get();
            return view('superuser.posts')->with('posts',$posts)->with('categories',$categories)->with('type','مراجعات');
        }

    }
    public function postsChecked(){
        if(Auth::user()->role == "admin"){
            $categories = Category::all();
            $posts = Post::where('stat','checked')->get();
            return view('superuser.posts')->with('posts',$posts)->with('categories',$categories)->with('type','تدقيق');
        }

    }
    public function categories(){
        
            if(Auth::user()->role == "admin"){
        $categories = Category::all();
        return view('superuser.categories')->with('categories',$categories);
            }else{
                return redirect('/dashboard');
            }
        
        

    }
    public function users(){
       
            if(Auth::user()->role == "admin"){
                $users = User::all();
                return view('superuser.users')->with('users',$users);
            }else{
                return redirect('/dashboard');
            }
            

        
        

    }
   public function ShowPost($idpost){
       $categories= Category::all();
       return view('superuser.post')->with('post',Post::find($idpost))->with('categories',$categories);

   }
   
   
}
