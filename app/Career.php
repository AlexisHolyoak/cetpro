<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    //
    protected $fillable=[
        'name','description','picture_path'
    ];
    public function course(){
        return $this->hasMany(Course::class);
    }
}
