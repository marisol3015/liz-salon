<?php

namespace multiventas\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'codigo',
        'nombre',
        'descripcion',
        'precio_venta',
        'marca_id',
        'categoria_id',
    ];

    /**
     * Get the brand that the product belongs to.
     */
    public function brand()
    {
        return $this->belongsTo('multiventas\Models\Marca','brand_id');
    }

    /**
     * Get the category that the product belongs to.
     */
    public function category()
    {
        return $this->belongsTo('multiventas\Models\Categoria','category_id');
    }
}