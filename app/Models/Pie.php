<?php

namespace multiventas\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pie extends Model
{
    use SoftDeletes;  

   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       
         'nombre',
         'precio',
                        
     ];
  
}