<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $fillable=[
        'start_date','end_date','days','shift','academic_period','teacher_id','state'
    ];
    /**
     * Students that belongs to a module
     */
    public function students(){
        return $this->belongsToMany(Student::class,'groups')->as('groups')->using(Group::class)->withPivot([
            'enrollment_confirmation','state'
        ]);
    }
    
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
    
    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
    }
    
    
}
