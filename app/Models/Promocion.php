<?php

namespace multiventas\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use SoftDeletes;
    

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    
    protected $primaryKey = 'documento';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'documento',
         'nombre',
         'apellido',
         'descuento',
         'valido',
         
               
     ];
    
}