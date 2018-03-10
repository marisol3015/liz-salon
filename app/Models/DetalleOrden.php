<?php

namespace Larashop\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetalleOrden extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'orden_id',
        'producto_id',
        'cantidad',
        'precio',
        'sub_total',
    ];
}