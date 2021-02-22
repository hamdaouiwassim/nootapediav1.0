<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Post;
use App\Category;
use App\User;
use App\Postnotes;
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
        }elseif (Auth::user()->role == 'editor' ||  Auth::user()->role == 'consulteur'){
            $posts = Post::all();
            $categories = Category::all();
            $users = User::all();
            return view('editor.index')->with('posts',count($posts))->with('categories',count($categories))->with('users',count($users));
   
        }
        elseif (Auth::user()->role == 'verificateur'){
            $posts = Post::all();
            $categories = Category::all();
            $users = User::all();
            return view('verificateur.index')->with('posts',count($posts))->with('categories',count($categories))->with('users',count($users));
   
        }
    }

    public function posts(){
            $users = User::all();
            if(Auth::user()->role == "admin"){
                $categories = Category::all();
                $posts = Post::whereIn('stat',['published','reviewed'])->OrderBy('created_at','DESC')->get();
                return view('superuser.posts')->with('posts',$posts)->with('categories',$categories)->with('type','مقالات')->with('users',$users);
            }elseif(Auth::user()->role == "editor"){
                $categories = Category::all();
                $posts = Post::whereIn('stat',['published','reviewed'])->OrderBy('created_at','DESC')->get();
                return view('editor.posts')->with('posts',$posts)->with('categories',$categories)->with('type','مقالات')->with('users',$users);
            }else{
                $categories = Category::all();
                $posts = Post::whereIn('stat',['published','reviewed'])->OrderBy('created_at','DESC')->get();
                return view('verificateur.posts')->with('posts',$posts)->with('categories',$categories)->with('type','مقالات')->with('users',$users);
            }
    }
    public function postsSaved(){
        $users = User::all();
        if(Auth::user()->role == "admin"){
            $categories = Category::all();
            $posts = Post::whereIn('stat',['saved','refused'])->get();
            return view('superuser.posts')->with('posts',$posts)->with('categories',$categories)->with('type','مسودات')->with('users',$users);
        }elseif(Auth::user()->role == "editor"){
            $categories = Category::all();
            $posts = Auth::user()->posts()->whereIn('stat',['saved','refused'])->get();
            return view('editor.posts')->with('posts',$posts)->with('categories',$categories)->with('type','مسودات')->with('users',$users);
        }
        else{
            $categories = Category::all();
            $posts = Post::whereIn('stat',['saved','refused'])->get();
            return view('verificateur.posts')->with('posts',$posts)->with('categories',$categories)->with('type','مسودات')->with('users',$users);
        }

    }
    public function PostsInReviewUser(){
        $users = User::all();
        if(Auth::user()->role == "admin"){
            $categories = Category::all();
            $posts = Post::where('stat','inreview')->get();
            return view('superuser.posts')->with('posts',$posts)->with('categories',$categories)->with('type','في طور المراجعة')->with('users',$users);
        }elseif(Auth::user()->role == "editor"){
            $categories = Category::all();
            $posts = Auth::user()->posts()->where('stat','inreview')->get();
            return view('editor.posts')->with('posts',$posts)->with('categories',$categories)->with('type','في طور المراجعة')->with('users',$users);
        }
        else{
            $categories = Category::all();
            $posts = Post::where('stat','inreview')->get();
            return view('verificateur.posts')->with('posts',$posts)->with('categories',$categories)->with('type','في طور المراجعة')->with('users',$users);
        }
    }
    public function postsReviewed(){
        $users = User::all();
        if(Auth::user()->role == "admin"){
            $categories = Category::all();
            $posts = Post::where('stat','inreview')->get();
            return view('superuser.posts')->with('posts',$posts)->with('categories',$categories)->with('type','مراجعات')->with('users',$users);
        }

    }
    public function postsChecked(){
        $users = User::all();
        if(Auth::user()->role == "admin"){
            $categories = Category::all();
            $posts = Post::where('stat','checked')->get();
            return view('superuser.posts')->with('posts',$posts)->with('categories',$categories)->with('type','تدقيق')->with('users',$users);
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

   public function postsReviewedUser(){
    $users = User::all();
       if ( Auth::user()->role == "editor"){
        $categories= Category::all();
        return view('editor.posts')->with('posts',Auth::user()->posts()->where('stat','reviewed')->get())->with('categories',$categories)->with('type','تمّت مراجعتها')->with('users',$users);
       
       }elseif ( Auth::user()->role == "verificateur"){
           
        $categories= Category::all();
        return view('verificateur.posts')->with('posts',Post::where('stat','reviewed')->get())->with('categories',$categories)->with('users',$users)->with('type','تمّت مراجعتها');
       
       }else{

       }
   }
   public function SendPostToReview($idpost){
       
        $post = Post::find($idpost);
        $post->stat = "inreview";
        $post->update();
        return redirect('dashboard/posts/user/inreview');

   }
   public function SendPostToShare($idpost){
        
    $post = Post::find($idpost);
    $post->stat = "reviewed";
    $post->idverificateur = Auth::user()->id  ;
    $post->verificateur_name = Auth::user()->name ;
    if ( $post->update() ){
        $post->user->solde = $post->user->solde + 8 ;
      
        $post->user->update();
    }
    return redirect('dashboard/posts');
    }
   public function PostsInReview(){
       if(Auth::user()->role == "verificateur"){
        $users = User::all();   
        $categories= Category::all();
        return view('verificateur.posts')->with('posts',Post::where('stat','inreview')->get())->with('categories',$categories)->with('users',$users)->with('type','مقالات في طور المراجعة');
       }
   }
   public function ResendPostToWriter(Request $request){
       if (Auth::user()->role == "verificateur"){
           $post = Post::find($request->postId);
           $post->stat = "refused";
           if ( $post->update()){
               $postnotes = new Postnotes();
               $postnotes->iduser = Auth::user()->id;
               $postnotes->idpost = $post->id;
               $postnotes->notes = $request->notes;
               $postnotes->save();
           }
        return redirect('dashboard/posts/inreview');



       }

   }
   
   public function FilterPosts(Request $request){
       //dd($request);
       //echo $request->postStat;
       $posts = Post::whereIn('stat',['published','reviewed'])->Orwhere('stat','reviewed')->OrderBy('created_at','DESC')->get();
        if( $request->postStat && $request->postWriter && $request->postDate ){
            $posts = Post::where('idcategory',$request->postStat)
                        ->where('iduser',$request->postWriter)
                       ->whereDate('created_at',$request->postDate)
                       
                       ->OrderBy('created_at','DESC')->get();

        }elseif($request->postStat && $request->postWriter){
            $posts = Post::where('idcategory',$request->postStat)
            ->where('iduser',$request->postWriter)
            
            ->OrderBy('created_at','DESC')->get();
        }elseif($request->postStat && $request->postDate){
            $posts = Post::where('idcategory',$request->postStat)
           ->whereDate('created_at',$request->postDate)
           
           ->OrderBy('created_at','DESC')->get();
        }elseif($request->postWriter && $request->postDate){
            $posts = Post::where('iduser',$request->postWriter)
           ->whereDate('created_at',$request->postDate)
          
           ->OrderBy('created_at','DESC')->get();
        }elseif($request->postWriter){
            $posts = Post::where('iduser',$request->postWriter)
            
            ->OrderBy('created_at','DESC')->get();
        }elseif( $request->postDate){
            $posts = Post::whereDate('created_at',$request->postDate)
           
            ->OrderBy('created_at','DESC')->get();
        }elseif($request->postStat){
           
            $posts = Post::where('idcategory',$request->postStat)
            
            ->OrderBy('created_at','DESC')->get();
            //dd($posts);
        }
        
        $users = User::all();
        if(Auth::user()->role == "verificateur"){
            $categories = Category::all();
            if ( $request->postsType == "مسودات"){
                return view('verificateur.posts')->with('posts',$posts->whereIn('stat',['saved','refused']))->with('categories',$categories)->with('type',$request->postsType)->with('users',$users);
            }elseif ($request->postsType == "مقالات في طور المراجعة"){
                return view('verificateur.posts')->with('posts',$posts->where('stat','inreview'))->with('categories',$categories)->with('type',$request->postsType)->with('users',$users);
            }elseif ($request->postsType == "تمّت مراجعتها"){
                return view('verificateur.posts')->with('posts',$posts->where('stat','reviewed'))->with('categories',$categories)->with('type',$request->postsType)->with('users',$users);
            }
            return view('verificateur.posts')->with('posts',$posts->whereIn('stat',['reviewed','published']))->with('categories',$categories)->with('type',$request->postsType)->with('users',$users);
        }elseif(Auth::user()->role == "editor"){
            $categories = Category::all();
            if ( $request->postsType == "مسودات"){
                return view('editor.posts')->with('posts',$posts->where('iduser',Auth::user()->id)->whereIn('stat',['saved','refused']))->with('categories',$categories)->with('type',$request->postsType)->with('users',$users);
            }elseif ($request->postsType == "مقالات في طور المراجعة"){
                return view('editor.posts')->with('posts',$posts->where('iduser',Auth::user()->id)->where('stat','inreview'))->with('categories',$categories)->with('type',$request->postsType)->with('users',$users);
            }elseif ($request->postsType == "تمّت مراجعتها"){
                return view('editor.posts')->with('posts',$posts->where('iduser',Auth::user()->id)->where('stat','reviewed'))->with('categories',$categories)->with('type',$request->postsType)->with('users',$users);
            }
            return view('editor.posts')->with('posts',$posts->whereIn('stat',['reviewed','published']))->with('categories',$categories)->with('type',$request->postsType)->with('users',$users);
      
        }else{
            $categories = Category::all();
            if ( $request->postsType == "مسودات"){
                return view('superuser.posts')->with('posts',$posts->whereIn('stat',['saved','refused']))->with('categories',$categories)->with('type',$request->postsType)->with('users',$users);
            }elseif ($request->postsType == "مقالات في طور المراجعة"){
                return view('superuser.posts')->with('posts',$posts->where('stat','inreview'))->with('categories',$categories)->with('type',$request->postsType)->with('users',$users);
            }elseif ($request->postsType == "تمّت مراجعتها"){
                return view('superuser.posts')->with('posts',$posts->where('stat','reviewed'))->with('categories',$categories)->with('type',$request->postsType)->with('users',$users);
            }
            return view('superuser.posts')->with('posts',$posts->whereIn('stat',['reviewed','published']))->with('categories',$categories)->with('type',$request->postsType)->with('users',$users);
       
        }
   }
   
   
}
