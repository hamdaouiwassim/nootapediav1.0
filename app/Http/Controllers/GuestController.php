<?php

namespace App\Http\Controllers;
use App\Post;
use App\Category;
use Illuminate\Http\Request;
use Str;
class GuestController extends Controller
{
    //
    public function index(){
        $posts = Post::where('stat','published')->get();




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

        return view('index')->with('posts',$posts);
    }
    public function ShowUserPost($idpost){
        $post = Post::find($idpost);
        return view('post')->with('post',$post);
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
        //dd($request);
        // $validatedData = $request->validate([
        //     'searchkeywords' => 'required'
        // ]);
        $keywords = $request->searchkeywords;
        $date = $request->date;
        $category = $request->category;

        
            if($date){
                echo "date non vide";
                if ($category){
                    echo "category non vide";
                    $posts= Post::where('stat','published')
                    ->where('title','Like','%'.$keywords.'%')
                    ->Orwhere('content','Like','%'.$keywords.'%')
                    ->where('idcategory',$category)
                    ->where('created_at',$date)
                    ->get();

                }else{
                    echo "category vide";
                    $posts= Post::where('stat','published')
                    ->where('title','Like','%'.$keywords.'%')
                    ->Orwhere('content','Like','%'.$keywords.'%')
                    ->where('created_at',$date)
                    ->get();
                }
                
            }else{
                echo "date vide";
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
                    echo "category vide";
                    $posts= Post::where('stat','published')
                    ->where('title','Like','%'.$keywords.'%')
                    ->Orwhere('content','Like','%'.$keywords.'%')
                    ->get();
                }
              
            }
           
    dd($posts);
       

    }
    public function ShowSearch(){
        $categories = Category::all();
        return view('search')->with('categories',$categories);
    }
}

