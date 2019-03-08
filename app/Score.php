<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Score extends Pivot
{
    protected $fillable=[
        'score'
    ]; 
}
