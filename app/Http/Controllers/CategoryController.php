<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Auth;
class CategoryController extends Controller
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
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;

        if ( $request->file('image') ){
            $newname = uniqid().".".$request->file('image')->getClientOriginalExtension();
                
            //Move Uploaded File
            $destinationPath = 'uploads/categories/images';
            $request->file('image')->move($destinationPath,$newname);
            $category->image = $newname;
        }

    
        if ( $category->save() ) {
            return redirect()->back()->with('success',"تمت إضافة التصنيف ");
        }else{
            return redirect()->back()->with('error',"لم تتم إضافة التصنيف ");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        //
        $category = Category::find($request->idcategory);
        $category->name = $request->name;
        $category->description = $request->description;

        if ( $request->file('image') ){
            $image_path = base_path("public\uploads\categories\images\\$category->image");

            if (File::exists($image_path)) {
                //File::delete($image_path);
                unlink($image_path);
            }
            $newname = uniqid().".".$request->file('image')->getClientOriginalExtension();
                
            //Move Uploaded File
            $destinationPath = 'uploads/categories/images';
            $request->file('image')->move($destinationPath,$newname);
            $category->image = $newname;
        }

    
        if ( $category->update() ) {
            return redirect()->back()->with('success',"تم تحديث التصنيف ");
        }else{
            return redirect()->back()->with('error',"لم يتم تحديث التصنيف ");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($idcategory)
    {
        //
        if ( Auth::user()->role == "admin" ){
         
            if ( Category::find($idcategory) ){
                $category=Category::find($idcategory);
                $image_path = base_path("public\uploads\categories\images\\$category->image");
                //dd($image_path);

                if (File::exists($image_path)) {
                    //dd($image_path);
                    //File::delete($image_path);
                    unlink($image_path);
                }
                Category::find($idcategory)->delete();
              
               return redirect()->back()->with('success',"تمّ حذف التصنيف ");
            }else{
               
                return redirect()->back()->with('error',"لم نستطع حذف التصنيف ");
            }
        }else{
            return redirect()->back()->with('error',"لا تملك صلوحيّة الولوج الي هذه الصفحة ");
        }
      
        
    }
}
