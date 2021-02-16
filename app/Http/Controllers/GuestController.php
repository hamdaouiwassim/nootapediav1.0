<?php

namespace App\Http\Controllers;
use App\Post;
use App\Category;
use Illuminate\Http\Request;
use Str;
use App\User;
class GuestController extends Controller
{
    //
    public function index(){
        $posts = Post::where('stat','published')->orderBy('created_at', 'DESC')->get();


$categories = Category::all();

        $lignes = count($posts);
       
       
       if ( $lignes != 0 ) {
           for( $c1 = 0 ; $c1 < $lignes ; $c1++ ){
               
                   $taglessBody = strip_tags($posts[$c1]->content);
               //dd($taglessBody);
               if ($taglessBody[100] != " ") {
                       $posts[$c1]->content = Str::limit($taglessBody,$this->chercherSpace($taglessBody,100), ' ...');
               }else{
                   $posts[$c1]->content = Str::limit($taglessBody,100, ' ...');
               }   
               
           }
        }

        return view('index')->with('posts',$posts)->with('categories',$categories);
    }
    public function ShowUserPost($idpost){
        
        $categories = Category::all();
        $post = Post::find($idpost);
        if ($post){
            $post->views= $post->views + 1;
            $post->update();

        }
        return view('post')->with('post',$post)->with('categories',$categories);
    }
    public function chercherSpace($taglessBody,$n){
        for( $i=$n; $i<=strlen($taglessBody); $i++ ){
            if ( $taglessBody[$i] == " "){
                    return $i;
            } 

        }
        return strlen($taglessBody);

    }
    public function search(Request $request){
        $categories = Category::all();
        $validatedData = $request->validate([
            'searchkeywords' => 'required'
        ],
        ['searchkeywords.required' => 'لم تكتب شيء في خانة البحث ...']
    );
        
        $keywords = $request->searchkeywords;
        $date = $request->date;
        $category = $request->category;

        if($date){
            //echo "date non vide";
            if ($category){
                //echo "category non vide";
                $posts= Post::where('stat','published')
                ->where('title','Like','%'.$keywords.'%')
                ->Orwhere('content','Like','%'.$keywords.'%')
                ->where('idcategory',$category)
                ->where('created_at',$date)
                ->where('stat','published')
                ->get();

            }else{
                //echo "category vide";
                $posts= Post::where('stat','published')
                ->where('title','Like','%'.$keywords.'%')
                ->Orwhere('content','Like','%'.$keywords.'%')
                ->where('created_at',$date)
                ->where('stat','published')
                ->get();
            }
            
        }else{
            //echo "date vide";
            if ($category){
                echo $category;
                echo "category non vide";
                $posts= Post::where('stat','published')
                ->where('idcategory',$category)
                ->where('title','Like','%'.$keywords.'%')
                ->Orwhere('content','Like','%'.$keywords.'%')
                ->where('idcategory',$category)
                ->where('stat','published')
                ->get();

            }else{
                //echo "category vide";
                $posts= Post::where('stat','published')
                ->where('title','Like','%'.$keywords.'%')
                ->Orwhere('content','Like','%'.$keywords.'%')
                ->where('stat','published')
                ->get();
            }
          
        }
            $lignes = count($posts);
            if ( $lignes != 0 ) {
                for( $c1 = 0 ; $c1 < $lignes ; $c1++ ){
                    
                        $taglessBody = strip_tags($posts[$c1]->content);
                    //dd($taglessBody);
                    if ($taglessBody[100] != " ") {
                            $posts[$c1]->content = Str::limit($taglessBody,$this->chercherSpace($taglessBody,100), ' ...');
                    }else{
                        $posts[$c1]->content = Str::limit($taglessBody,100, ' ...');
                    }   
                    
                }
             }
     
           
            return view('searchresult')->with('posts',$posts)->with('searchkeywords',$keywords)->with('categories',$categories);
       

    }
    public function ShowSearch(){
        $categories = Category::all();
        return view('search')->with('categories',$categories);
    }

    public function about(){
        $categories = Category::all();
        return view('about')->with('categories',$categories);
    }

    public function contact(){
        $categories = Category::all();
        return view('contact')->with('categories',$categories);
    }

    public function sharewithus(){
        $categories = Category::all();
        return view('sharewithus')->with('categories',$categories);
    }
    public function CategoryPosts($id,$name){
        $categories = Category::all();
         //
        //dd($idcategory);
        
        $category = Category::find($id);
        $posts = $category->posts->where('stat','published');
        $lignes = count($posts);
       
       
       if ( $lignes != 0 ) {
           for( $c1 = 0 ; $c1 < $lignes ; $c1++ ){
               
                   $taglessBody = strip_tags($posts[$c1]->content);
               //dd($taglessBody);
               if ($taglessBody[100] != " ") {
                       $posts[$c1]->content = Str::limit($taglessBody,$this->chercherSpace($taglessBody,100), ' ...');
               }else{
                   $posts[$c1]->content = Str::limit($taglessBody,100, ' ...');
               }   
               
           }
        }
      
        //dd($category);
        return view('category')->with('category',$category)->with('posts',$posts)->with('categories',$categories);
    }
    public function Team(){
        $categories = Category::all();
        $team = User::whereIn('role',['editor','verificateur'])->get();
        return view('team')->with('team',$team)->with('categories',$categories);
    }
}

