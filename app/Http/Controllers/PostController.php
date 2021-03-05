<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Auth;
use App\Category;
use Illuminate\Support\Facades\File;
class PostController extends Controller
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
            $categories = Category::all();
            if (Auth::user()->role == "admin"){
                return view('superuser.addPost')->with('categories',$categories);
            }else if(Auth::user()->role == "editor"){
                return view('editor.addPost')->with('categories',$categories);
            }else if(Auth::user()->role == "verificateur"){
                return view('verificateur.addPost')->with('categories',$categories);

            }
            
        
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
         //
         
            $post = new Post();
            $post->title = $request->title;
            $post->slug = $this->make_slug($request->title);
            $post->content = $request->content;
            $post->stat = "saved";
            //$post->keywords = $request->keywords;
            $post->iduser = Auth::user()->id ;
            $post->idcategory = $request->category ;
            if ($request->meta_description){
                $post->meta_description = $request->meta_description ;
            }
            if ($request->published_at){
                $post->published_at = $request->published_at ;
            }
            if ( $request->file('image') ){
                $newname = uniqid().".".$request->file('image')->getClientOriginalExtension();
                    
                //Move Uploaded File
                $destinationPath = 'uploads/posts/images';
                $request->file('image')->move($destinationPath,$newname);
                $post->image = $newname;
            }

            if ( $request->file('soundfile') ){
                $newname = uniqid().".".$request->file('soundfile')->getClientOriginalExtension();
                    
                //Move Uploaded File
                $destinationPath = 'uploads/posts/sounds';
                $request->file('soundfile')->move($destinationPath,$newname);
                $post->soundfile = $newname;
            }
    
        
            if ( $post->save() ) {
                return redirect()->back()->with('success',"تمت إضافة المقالة ");
            }else{
                return redirect()->back()->with('error',"لم تتم إضافة المقالة ");
            }
            
         
         
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($idpost)
    {
        //
        
            $post = Post::find($idpost);
            $categories = Category::all();
            if (Auth::user()->role == "admin"){
                return view('superuser.editPost')->with('post',$post)->with('categories',$categories);
            }else if(Auth::user()->role == "editor"){
                return view('editor.editPost')->with('post',$post)->with('categories',$categories);
            }else{
                return view('verificateur.editPost')->with('post',$post)->with('categories',$categories);
            }
            
        

        
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
       //dd($request);
        $post =Post::find($request->idpost);
        
     
        $post->title = $request->title;
        $post->slug = $this->make_slug($request->title);
        $post->content = $request->content;
        
        if (Auth::user()->role =="admin" || Auth::user()->role =="verificateur"  ){
            if ($request->published_at){
                $post->published_at = $request->published_at ;
            }
            if($request->note){
                $post->note = $request->note;
            }
            if($request->stat){
                $post->stat = $request->stat;
            }
            if($request->keywords){
                $post->keywords = $request->keywords;
            }
            
            
        }
        if ($request->meta_description){
            $post->meta_description = $request->meta_description ;
        }
        
        
       
        $post->idcategory = $request->category ;
        if ( $request->file('image') ){

            $image_path = base_path("public\uploads\posts\images\\$post->image");
            //dd($image_path);
    
            if (File::exists($image_path)) {
                //dd($image_path);
                //File::delete($image_path);
                unlink($image_path);
            }
            $newname = uniqid().".".$request->file('image')->getClientOriginalExtension();
                
            //Move Uploaded File
            $destinationPath = 'uploads/posts/images';
            $request->file('image')->move($destinationPath,$newname);
            $post->image = $newname;
        }
        if ( $request->file('soundfile') ){

            $soundfile_path = base_path("public\uploads\posts\sounds\\$post->soundfile");
            //dd($soundfile_path);
    
            if (File::exists($soundfile_path)) {
                //dd($soundfile_path);
                //File::delete($soundfile_path);
                unlink($soundfile_path);
            }
            $newname = uniqid().".".$request->file('soundfile')->getClientOriginalExtension();
                
            //Move Uploaded File
            $destinationPath = 'uploads/posts/sounds';
            $request->file('soundfile')->move($destinationPath,$newname);
            $post->soundfile = $newname;
        }

    
        if ( $post->save() ) {
            return redirect()->back()->with('success',"تمت تحديث المقالة ");
        }else{
            return redirect()->back()->with('error',"لم تتم تحديث المقالة ");
        }
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($idpost)
    {
        //
        if ( Auth::user()->role == "admin" || Post::find($idpost)->iduser = Auth::user()->id ){
         
            if ( Post::find($idpost) ){
                $post = Post::find($idpost);
                $image_path = base_path("public\uploads\posts\images\\$post->image");
                //dd($image_path);

                if (File::exists($image_path)) {
                    //dd($image_path);
                    //File::delete($image_path);
                    unlink($image_path);
                }
                Post::find($idpost)->delete();
              
               return redirect()->back()->with('success',"تمّ حذف المقالة ");
            }else{
               
                return redirect()->back()->with('error',"لم نستطع حذف المقالة ");
            }
        }else{
            return redirect()->back()->with('error',"لا تملك صلوحيّة الولوج الي هذه الصفحة ");
        }
    }
    //slugify arabic characters string function
    public function make_slug($string, $separator = '-')
    {
    $string = trim($string);
    $string = mb_strtolower($string, 'UTF-8');

    // Make alphanumeric (removes all other characters)
    // this makes the string safe especially when used as a part of a URL
    // this keeps latin characters and Persian characters as well
    $string = preg_replace("/[^a-z0-9_\s\-۰۱۲۳۴۵۶۷۸۹ويـءاآؤئبپتثجچحخدذرزژسشصضطظعغفقکكگگلمنوهیإلأةى ]/u", '', $string);

    // Remove multiple dashes or whitespaces or underscores
    $string = preg_replace("/[\s\-_]+/", ' ', $string);

    // Convert whitespaces and underscore to the given separator
    $string = preg_replace("/[\s_]+/", $separator, $string);
    $arabic_punct = ['،', '؛', '؟', '⠐', '!'];

    foreach ($arabic_punct as $punct) {
            $string = preg_replace("#".mb_strtolower($punct, 'UTF-8')."#", '', $string);
    }

    return $string;
    }


    
}
