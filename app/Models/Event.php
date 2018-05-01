<?php

namespace multiventas\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
        protected $fillable = ['title','start_date','end_date','hora_inicio','hora_final'];
    
    

}