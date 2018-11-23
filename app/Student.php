<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'birthday_date', 'gender', 'civil_status','document_type','document_number',
        'education_level', 'worker','phone_number','cellphone_number','meet_way'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
