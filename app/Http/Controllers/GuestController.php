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
        $posts = Post::where('stat','published')->orderBy('published_at', 'DESC')->paginate(14);


$categories = Category::all();

       
        foreach($posts as $post){
            $taglessBody = strip_tags($post->content);
        
            if ($taglessBody[100] != " ") {
           
                    $post->content = Str::limit($taglessBody,$this->chercherSpace($taglessBody,100), ' ...');
            }else{
            
                $post->content = Str::limit($taglessBody,100, ' ...');
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
        $relatedposts = $post->category->posts->where('stat','published')->where('id','!=',$post->id);
        if (count($relatedposts) < 2 ){
            if(count($relatedposts) == 0){
                $posts = Post::where('id','!=',$post->id)->get();
                $shuffled = $posts->shuffle();
                $shuffled = $shuffled->skip(0)->take(2);
            }else{
                $posts = Post::where('id','!=',$post->id)->get();
                $shuffled = $posts->shuffle();
                $shuffled = $shuffled->skip(0)->take(1);
            }

        }else{
            $shuffled = $relatedposts->shuffle();
            $shuffled = $shuffled->skip(0)->take(2);
        }
        
      

        


        foreach($shuffled as $rpost){
            
            $taglessBody = strip_tags($rpost->content);
        
            if ($taglessBody[100] != " ") {
           
                    $rpost->content = Str::limit($taglessBody,$this->chercherSpace($taglessBody,100), ' ...');
            }else{
            
                $rpost->content = Str::limit($taglessBody,100, ' ...');
            }   
        }
        
        return view('post')->with('post',$post)->with('categories',$categories)->with('related',$shuffled);
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
                ->orderBy('published_at', 'DESC')->get();

            }else{
                //echo "category vide";
                $posts= Post::where('stat','published')
                ->where('title','Like','%'.$keywords.'%')
                ->Orwhere('content','Like','%'.$keywords.'%')
                ->where('created_at',$date)
                ->where('stat','published')
                ->orderBy('published_at', 'DESC')->get();
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
                ->orderBy('published_at', 'DESC')->get();

            }else{
                //echo "category vide";
                $posts= Post::where('stat','published')
                ->where('title','Like','%'.$keywords.'%')
                ->Orwhere('content','Like','%'.$keywords.'%')
                ->where('stat','published')
                ->orderBy('published_at', 'DESC')->get();
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
    public function Privacy(){
        $categories = Category::all();
        return view('privacy')->with('categories',$categories);
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
        $posts = $category->posts->where('stat','published')->sortByDesc('published_at');
        $lignes = count($posts);
       
       foreach($posts as $post){
                $taglessBody = strip_tags($post->content);
            
                if ($taglessBody[100] != " ") {
               
                        $post->content = Str::limit($taglessBody,$this->chercherSpace($taglessBody,100), ' ...');
                }else{
                
                    $post->content = Str::limit($taglessBody,100, ' ...');
                }   
       }
      
        return view('category')->with('category',$category)->with('posts',$posts)->with('categories',$categories);
    }
    public function Team(){
        $categories = Category::all();
        $team = User::whereIn('role',['editor','verificateur'])->where('verified',1)->get();
        return view('team')->with('team',$team)->with('categories',$categories);
    }
}

