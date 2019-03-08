<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/prueba',function(){
    $user=App\User::findOrFail(1);
    return $user->address;
});
Route::group(['prefix'=>'student','as'=>'student.'],function (){
    Route::post('/',['uses'=>'StudentController@store'])->name('store');
    Route::get('/create',['uses'=>'StudentController@create'])->name('create');
    Route::get('/show/{student}',['uses'=>'StudentController@show'])->name('show');
    Route::get('/edit/{student}',['uses'=>'StudentController@edit'])->name('edit');
    Route::post('/update/{student}',['uses'=>'StudentController@update'])->name('update');
    Route::get('/home',['uses'=>'StudentController@home'])->name('home');
});

Route::group(['prefix' => 'career','as'=>'career.'], function() {
    Route::get('/',['uses'=>'CareerController@index'])->name('index');
    Route::get('/create',['uses'=>'CareerController@create'])->name('create');
    Route::post('/store',['uses'=>'CareerController@store'])->name('store');
    Route::get('/show/{career}',['uses'=>'CareerController@show'])->name('show');    
});

Route::group(['prefix' => 'module','as'=>'module.'], function() {
    Route::post('/store/{course}',['uses'=>'ModuleController@store'])->name('store');    
    
});

Route::group(['prefix' => 'course','as'=>'course.'], function() {
    Route::get('/',['uses'=>'CourseController@index'])->name('index');
    Route::get('/create/{career}',['uses'=>'CourseController@create'])->name('create');
    Route::post('/store/{career}',['uses'=>'CourseController@store'])->name('store');
    Route::get('/show/{course}',['uses'=>'CourseController@show'])->name('show');
    Route::get('/edit/{course}',['uses'=>'CourseController@edit'])->name('edit');
    Route::post('/update/{course}',['uses'=>'CourseController@update'])->name('update');
});

Route::group(['prefix' => 'teacher','as'=>'teacher.'], function() {
    Route::get('/create',['uses'=>'TeacherController@create'])->name('create');
    Route::post('/store',['uses'=>'TeacherController@store'])->name('store');
    Route::get('/show/{teacher}',['uses'=>'TeacherController@show'])->name('show');
    Route::get('/edit/{teacher}',['uses'=>'TeacherController@edit'])->name('edit');
    Route::post('/update/{teacher}',['uses'=>'TeacherController@update'])->name('update');
});

Route::group(['prefix' => 'evaluation','as'=>'evaluation.'], function() {
    Route::get('/create/{module}',['uses'=>'EvaluationController@create'])->name('create');
    Route::get('/',['uses'=>'EvaluationController@index'])->name('index');
    Route::post('/store/{module}',['uses'=>'EvaluationController@store'])->name('store');
    Route::post('/update/{module}',['uses'=>'EvaluationController@update'])->name('update');    
});

Route::group(['prefix' => 'group','as'=>'group.'], function() {
    Route::post('/{module}',['uses'=>'GroupController@store'])->name('store');
});

Route::group(['prefix' => 'score','as'=>'score.'], function() {
    Route::get('/{module}',['uses'=>'ScoreController@acta'])->name('acta');
    Route::get('/{alumno}/{module}',['uses'=>'ScoreController@show'])->name('show');
    Route::post('/{alumno}/{evaluation}/{module}',['uses'=>'ScoreController@store'])->name('store');
});

Route::get('/score',function(){
   return view('score.student.index');
});