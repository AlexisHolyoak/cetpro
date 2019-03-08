<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    //
    protected $fillable=[
        'phone_number','photo_path','cellphone_number'
    ];    
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function module()
    {
        return $this->hasOne(Module::class);
    }
    
}
