<?php

namespace App\Http\Controllers;

use App\Course;
use App\Career;
use App\Teacher;
use App\Module;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
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
    public function create(Career $career)
    {
        return view('course.create',compact('career'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Career $career)
    {   
        //getting the image
        $url=$request->file('picture_path')->getRealPath();
        //storing that bitch
        $course=$career->course()->create([
            'name'=>$request->name,
            'qualification'=>$request->qualification,
            'hours_quantity'=>$request->hours_quantity,
            'description'=>$request->description,
            'state'=>'DISPONIBLE',
            'picture_path'=>Storage::disk('s3')->putFile('ranbla920cxv/public/courses',new File($url))
        ]);
        return redirect()->action('CourseController@show',['course'=>$course]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        $career=$course->career;
        $teachers=Teacher::all();
        $modules=$course->modules;
        return view('course.show',compact('course','career','teachers','modules'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $career=$course->career;
        return view('course.edit',compact('course','career'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }
}
