<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Rede
 *
 * @property $id
 * @property $facebook
 * @property $linkedin
 * @property $twitter
 * @property $youtube
 * @property $tiktok
 * @property $whatsapp
 * @property $indeed
 * @property $instagram
 * @property $pagina_web
 * @property $created_at
 * @property $updated_at
 *
 * @property Bimer[] $bimers
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Rede extends Model
{
    
    static $rules = [
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['facebook','linkedin','twitter','youtube','tiktok','whatsapp','indeed','instagram','pagina_web'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bimers()
    {
        return $this->hasMany('App\Models\Bimer', 'id_ficheros', 'id');
    }
    

}
