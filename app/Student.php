<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'birthday_date', 'gender', 'civil_status','document_type','document_number',
        'education_level', 'worker','cellphone_number','meet_way','student_code','external_student_code',
        'occupation','phone_number','photo_path'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }  
      /**
     * Modules that has a students
     */
    public function modules(){
        return $this->belongsToMany(Module::class,'groups')->as('groups')->using(Group::class)->withPivot([
            'enrollment_confirmation','state'
        ]);
    }
    
    public function evaluations()
    {
        return $this->belongsToMany(Evaluation::class, 'scores')->as('scores')->using(Score::class)->withPivot([
            'score'
        ])->withTimestamps();
    }
    
}
