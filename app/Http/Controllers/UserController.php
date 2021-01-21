<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use Hash;

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
    public function update(Request $request, $id)
    {
        //
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
}
