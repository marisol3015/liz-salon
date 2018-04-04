<?php

namespace multiventas\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empleado extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
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
        'direccion',
        'telefono',
        'email',
        'usuario',
        'contrasena',
       
    ];

    /**
     * obtener los productos de la marca.
     */
    public function products()
    {
        return $this->hasMany('multiventas\Models\Producto','empleado_documento','documento');
    }
}