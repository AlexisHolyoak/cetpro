<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    //7
    protected $fillable=[
      'name'
    ];
    //esto no
    public function course(){
        return $this->belongsTo(Course::class);
    }
    
    public function module()
    {
        return $this->belongsTo(Module::class);
    }
    
    public function students()
    {
        return $this->belongsToMany(Evaluation::class, 'scores')->as('scores')->using(Score::class)->withPivot([
            'score'
        ])->withTimestamps();
    }
    
}
