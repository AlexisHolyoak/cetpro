<?php

namespace App\Http\Controllers;

use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
class TeacherController extends Controller
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
        return view('teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user=Auth::user();       
        $url=$request->file('photo_path')->getRealPath(); 
        $teacher=$user->teacher()->updateOrCreate(
            [
            'user_id'=>$user->id        
            ],[
            'phone_number'=>$request->phone_number,
            'cellphone_number'=>$request->cellphone_number,
            'photo_path'=>Storage::disk('public')->putFile('teachers',new File($url))
            ]
        );
        return redirect()->action('TeacherController@show',['teacher'=>$teacher]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
       return view('teacher.show',compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
       return view('teacher.edit',compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        $url=$request->file('photo_path')->getRealPath(); 
        $teacher->phone_number=$request->phone_number;
        $teacher->cellphone_number=$request->cellphone_number;
        $teacher->$photo_path=Storage::disk('public')->putFile('teachers',new File($url));
        $teacher->save();
        return redirect()->action('TeacherController@show',['teacher'=>$teacher]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        //
    }
}
