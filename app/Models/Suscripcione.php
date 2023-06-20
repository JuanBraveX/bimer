<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Suscripcione
 *
 * @property $id
 * @property $id_cliente
 * @property $id_plan
 * @property $inicio_en
 * @property $finaliza_en
 * @property $cancelo_en
 * @property $renovacion
 * @property $renovacion_cancelada
 * @property $cantidad
 * @property $precio_neto
 * @property $descuento
 * @property $precio_real
 * @property $suspendida
 * @property $created_at
 * @property $updated_at
 *
 * @property Bimer[] $bimers
 * @property Plane $plane
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Suscripcione extends Model
{
    
    static $rules = [
		'id_cliente' => 'required',
		'id_plan' => 'required',
		'inicio_en' => 'nullable',
		'finaliza_en' => 'nullable',
		'cancelo_en' => 'nullable',
		'renovacion' => 'nullable',
		'renovacion_cancelada' => 'nullable',
		'cantidad' => 'required',
		'precio_neto' => 'required',
		'descuento' => 'required',
		'precio_real' => 'required',
		'suspendida' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_cliente','id_plan','inicio_en','finaliza_en','cancelo_en','renovacion','renovacion_cancelada','cantidad','precio_neto','descuento','precio_real','suspendida'];

/*'cancelo_en'*/
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bimers()
    {
        return $this->hasMany('App\Models\Bimer', 'id_suscripcion', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function plane()
    {
        return $this->hasOne('App\Models\Plane', 'id', 'id_plan');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_cliente');
    }
    

}
