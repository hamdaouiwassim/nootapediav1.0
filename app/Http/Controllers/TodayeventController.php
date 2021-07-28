<?php

namespace App\Http\Controllers;

use App\Todayevent;
use Illuminate\Http\Request;
use Auth;
use File;
class TodayeventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $events = TodayEvent::all();
        return view('superuser.events')->with('events',$events);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('superuser.addevent');
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
        $todayevent = new Todayevent();
        $todayevent->title = $request->title;
        $todayevent->description = $request->description;
        
        $todayevent->date = $request->date;

        if ( $request->file('image') ){
           
            $newname = uniqid().".".$request->file('image')->getClientOriginalExtension();
                
            //Move Uploaded File
            $destinationPath = 'uploads/todayevents/images';
            $request->file('image')->move($destinationPath,$newname);
            $todayevent->image = $newname;
        }

    
        if ( $todayevent->save() ) {
            return redirect()->back()->with('success',"تم إضافة حدث اليوم ");
        }else{
            return redirect()->back()->with('error',"لم يتم إضافة حدث اليوم ");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Todayevent  $todayevent
     * @return \Illuminate\Http\Response
     */
    public function show($idtodayevent)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Todayevent  $todayevent
     * @return \Illuminate\Http\Response
     */
    public function edit($idtodayevent)
    {
        //
        $event = Todayevent::find($idtodayevent);
        return view('superuser.editevent')->with('event',$event);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Todayevent  $todayevent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idevent)
    {
        //
        //
        $todayevent = Todayevent::find($idevent);
        $todayevent->title = $request->title;
        $todayevent->description = $request->description;
        
        $todayevent->date = $request->date;

        if ( $request->file('image') ){
            $image_path = base_path("public\uploads\todayevents\images\\$category->image");

            if (File::exists($image_path)) {
                //File::delete($image_path);
                unlink($image_path);
            }
            $newname = uniqid().".".$request->file('image')->getClientOriginalExtension();
                
            //Move Uploaded File
            $destinationPath = 'uploads/todayevents/images';
            $request->file('image')->move($destinationPath,$newname);
            $todayevent->image = $newname;
        }

    
        if ( $todayevent->update() ) {
            return redirect()->back()->with('success',"تم تحديث حدث اليوم ");
        }else{
            return redirect()->back()->with('error',"لم يتم تحديث حدث اليوم ");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Todayevent  $todayevent
     * @return \Illuminate\Http\Response
     */
    public function destroy($idtodayevent)
    {
        //
         //
         if ( Auth::user()->role == "admin" ){
         
            if ( Todayevent::find($idtodayevent) ){
                $category=Todayevent::find($idtodayevent);
                $image_path = base_path("public\uploads\todayevent\images\\$category->image");
                //dd($image_path);

                if (File::exists($image_path)) {
                    //dd($image_path);
                    //File::delete($image_path);
                    unlink($image_path);
                }
                Todayevent::find($idtodayevent)->delete();
              
               return redirect()->back()->with('success',"تمّ حذف حدث اليوم ");
            }else{
               
                return redirect()->back()->with('error',"لم نستطع حذف حدث اليوم ");
            }
        }else{
            return redirect()->back()->with('error',"لا تملك صلوحيّة الولوج الي هذه الصفحة ");
        }
    }
}
