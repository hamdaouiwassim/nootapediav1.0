<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use Hash;
use Auth;
use File;
class UserController extends Controller
{
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
        

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->telephone;
            $user->role = $request->role;
            $user->password = Hash::make($request->password);
            if ( $user->save() ) {
                return redirect()->back()->with('success',"تمت حذف المستخدم ");
            }else{
                return redirect()->back()->with('error',"لم تتم حذف المستخدم ");
            }
    
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $user = User::find($request->iduser);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->telephone;
        $user->role = $request->role;
        $user->description = $request->description;
        if ($request->password){
            $user->password = Hash::make($request->password);
        }
      
        if ( $user->update() ) {
            return redirect()->back()->with('success',"تمت تحديث بيانات المستخدم ");
        }else{
            return redirect()->back()->with('error',"لم تتم تحديث بيانات المستخدم ");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::find($id);
        if($user){
            if ( $user->delete() ){
                $posts = Post::where('iduser',$id)->get();
                foreach($posts as $p){
                    $p->delete();
                }
                return redirect()->back()->with('success',"تم حذف المستخدم ");
            }
            else{
                return redirect()->back()->with('error',"لم يتم حذف المستخدم ");
            }
            
        }
        else{
            return redirect()->back()->with('error',"لم يتم حذف المستخدم ");
        }
    }
    

    public function MeUpdate(Request $request)
    {
        //
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->telephone;
        if ( $request->file('avatar') ){
            
            // Check file size
            if ($request->file('avatar')->getSize() > 1000000) {
                return redirect()->back()->with('error',"حجم الصورة يجب أن لا يتجاوز 1 ميغابات");
               
                
            }
            
            // Allow certain file formats
            if($request->file('avatar')->getClientOriginalExtension() != "jpg" && $request->file('avatar')->getClientOriginalExtension() != "png" && $request->file('avatar')->getClientOriginalExtension() != "jpeg"
             ) {
                return redirect()->back()->with('error'," الصورة المقبولة يجب أن تكون بالإمتداد التالي : JPG, JPEG, PNG ");
               
              
            }
            if ($user->avatar){
                $image_path = base_path("public\uploads\users\images\\$user->avatar");
                //dd($image_path);
        
                if (File::exists($image_path)) {
                    
                    unlink($image_path);
                }
            }
           
            $newname = uniqid().".".$request->file('avatar')->getClientOriginalExtension();
                
            //Move Uploaded File
            $destinationPath = 'uploads/users/images';
            $request->file('avatar')->move($destinationPath,$newname);
            $user->avatar = $newname;
        }
        if ($request->password){
            if($request->password != $request->rpassword ){
                return redirect()->back()->with('error',"كلمات المرور غير متطابقة");
            }
            $user->password = Hash::make($request->password);
        }
      
        if ( $user->update() ) {
            return redirect()->back()->with('success',"تمت تحديث بيانات المستخدم ");
        }else{
            return redirect()->back()->with('error',"لم تتم تحديث بيانات المستخدم ");
        }
    }
    public function ShowProfile(){
                if(Auth::user()->role == "admin"){
                    return view('superuser.profile');

                }elseif(Auth::user()->role == "editor"){
                    return view('editor.profile');
                }else{
                   return view('verificateur.profile'); 
                }
    }
}
