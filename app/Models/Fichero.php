<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Fichero
 *
 * @property $id
 * @property $foto_perfil
 * @property $banner
 * @property $foto_1
 * @property $foto_2
 * @property $foto_3
 * @property $foto_4
 * @property $foto_5
 * @property $qr
 * @property $qrImg
 * @property $pdf
 * @property $video_link
 * @property $created_at
 * @property $updated_at
 *
 * @property Bimer[] $bimers
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Fichero extends Model
{
    
    static $rules = [
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['foto_perfil','banner','foto_1','foto_2','foto_3','foto_4','foto_5','qr','qrImg','pdf','video_link'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bimers()
    {
        return $this->hasMany('App\Models\Bimer', 'id_redes', 'id');
    }

}
