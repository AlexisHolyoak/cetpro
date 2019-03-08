<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    protected $fillable=[
        'name','qualification','hours_quantity','academic_period','description',
        'picture_path','state'
    ];
    public function career(){
        return $this->belongsTo(Career::class);
    }    
    public function modules()
    {
        return $this->hasMany(Module::class);
    }
    
   
}
