<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Bimer
 *
 * @property $id
 * @property $id_suscripcion
 * @property $nombre
 * @property $apellido
 * @property $empresa
 * @property $telefono
 * @property $puesto
 * @property $correo
 * @property $ubicacion_text
 * @property $ubicacion_mapa
 * @property $color_texto
 * @property $color_fondo
 * @property $id_ficheros
 * @property $id_redes
 * @property $created_at
 * @property $updated_at
 *
 * @property Fichero $fichero
 * @property Rede $rede
 * @property Suscripcione $suscripcione
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Bimer extends Model
{

    static $rules = [
        'id_suscripcion' => 'required',
        'id_ficheros' => 'required',
        'id_redes' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_suscripcion', 'nombre', 'apellido', 'empresa', 'telefono', 'puesto', 'correo', 'ubicacion_text', 'ubicacion_mapa', 'color_texto', 'color_fondo', 'id_ficheros', 'id_redes'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function fichero()
    {
        return $this->hasOne('App\Models\Fichero', 'id', 'id_ficheros');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function rede()
    {
        return $this->hasOne('App\Models\Rede', 'id', 'id_redes');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function suscripcione()
    {
        return $this->hasOne('App\Models\Suscripcione', 'id', 'id_suscripcion');
    }

    public function bimers()
    {
        return $this->hasMany(Bimer::class, 'id_suscripciones');
    }
}
