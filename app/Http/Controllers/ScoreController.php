<?php

namespace App\Http\Controllers;

use DB;
use App\Module;
use App\Group;
use App\Student;
use App\Evaluation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ScoreController extends Controller
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
    public function store(Request $request,Student $alumno, Evaluation $evaluation,Module $module)
    {
        //PARA ALMACENAR NUEVOS REGISTROS UTILIZAR UPDATE OR CREATE PARA LAS NOTAS
        $score=DB::table('scores')->updateOrInsert([
            'student_id'=>$alumno->id,
            'evaluation_id'=>$evaluation->id
        ],
        [
           'student_id'=>$alumno->id,
           'evaluation_id'=>$evaluation->id,
           'score'=>$request->score
        ]);
        return redirect()->action('ScoreController@show',['alumno'=>$alumno,'module'=>$module]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function show(Student $alumno,Module $module)
    {
        $evaluations=$module->evaluations;
        $course=$module->course;
        $teacher=$module->teacher;
        $students=$module->students;
        $scores=DB::table('scores')->get();
        return view('score.teacher.show',compact('evaluations','module','course','teacher','students','scores','alumno'));   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function edit(Score $score)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Score $score)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function destroy(Score $score)
    {
        //
    }

    public function acta(Module $module){
        $evaluations=$module->evaluations;
        $course=$module->course;
        $students=$module->students;
        $teacher=$module->teacher;   
        $scores=DB::table('scores')->get();     
        return view('score.teacher.acta',compact('evaluations','course','students','module','teacher','scores'));
    }
}
