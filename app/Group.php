<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Group extends Pivot
{
       protected $fillable=[
        'enrollment_confirmation','state'
       ];
}
