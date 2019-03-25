<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
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
     * Display tha main page of the student
     *
    **/
    public function home(){
        $user=Auth::user();
        $student= $user->student;
        if(!empty($student)){
            return view('student.home',compact('student'));
        }else{
            $student=new Student();
            $student->student_code='';
            $student->external_student_code='';
            $student->birthday_date='';
            $student->gender='';
            $student->civil_status='';
            $student->document_type='';
            $student->education_level='';
            $student->document_number='';
            $student->worker='';
            $student->occupation='';
            $student->phone_number='';
            $student->cellphone_number='';
            $student->meet_way='';
            $student->photo_path='avatars/picture-default.jpg';
            return view('student.home',compact('student'));
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //get las id in records
        $id=0;
        if (!empty(Student::orderBy('created_at','desc')->first())) {
            $id=Student::orderBy('created_at','desc')->first()->id + 3000001;
        } else {
           $id=30000001;
        }
        return view('student.create',compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //user must have store permission for this method
        $user=Auth::user();
        //handle image url
        $url=$request->file('photo_path')->getRealPath();
        //creating student code number
        $id=0;
        if (!empty(Student::orderBy('created_at','desc')->first())) {
            $id=Student::orderBy('created_at','desc')->first()->id + 3000001;
        } else {
           $id=30000001;
        }
        //validate that user must be logged in first
        $student=$user->student()->create([
            'student_code'=>$id,
            'external_student_code'=>$request->external_student_code,
            'birthday_date'=>$request->birthday_date,
            'gender'=>$request->gender,
            'civil_status'=>$request->civil_status,
            'document_type'=>$request->document_type,
            'education_level'=>$request->education_level,
            'document_number'=>$request->document_number,
            'worker'=>$request->worker,
            'occupation'=>$request->occupation,
            'phone_number'=>$request->phone_number,
            'cellphone_number'=>$request->cellphone_number,
            'meet_way'=>$request->meet_way,
            'photo_path'=>Storage::disk('s3')->putFile('ranbla920cxv/public/avatars',new File($url))
        ]);
        $student->user->detachRole('user');
        $student->user->attachRole('student');
        return redirect()->action('StudentController@show',['student'=>$student]);
        //store permission is removed from user when finished
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('student.show',compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('student.edit',compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //this updates
        $student->external_student_code=$request->external_student_code;
        $student->birthday_date=$request->birthday_date;
        $student->gender=$request->gender;
        $student->civil_status=$request->civil_status;
        $student->document_type=$request->document_type;
        $student->education_level=$request->education_level;
        $student->document_number=$request->document_number;
        $student->worker=$request->worker;
        $student->occupation=$request->occupation;
        $student->phone_number=$request->phone_number;
        $student->cellphone_number=$request->cellphone_number;
        $student->meet_way=$request->meet_way;
        if(!empty($request->file('photo_path'))){
            $url=$request->file('photo_path')->getRealPath();
            $student->photo_path=Storage::disk('s3')->putFile('ranbla920cxv/public/avatars',new File($url));
        }       
        $student->save();
        return redirect()->action('StudentController@show',['student'=>$student]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
}
