<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Plane
 *
 * @property $id
 * @property $nombre
 * @property $descripcion
 * @property $precio
 * @property $descuento
 * @property $created_at
 * @property $updated_at
 *
 * @property Suscripcione[] $suscripciones
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Plane extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'descripcion' => 'required',
		'precio' => 'required',
		'descuento' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','descripcion','precio','descuento'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function suscripciones()
    {
        return $this->hasMany('App\Models\Suscripcione', 'id_plan', 'id');
    }
    

}
