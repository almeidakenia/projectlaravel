<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Playlist
 *
 * @property $id
 * @property $nombre
 * @property $created_at
 * @property $updated_at
 *
 * @property Cancione[] $canciones
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Playlist extends Model
{
    
    static $rules = [
		'nombre' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function canciones()
    {
        return $this->hasMany('App\Models\Cancione', 'playlist_id', 'id');
    }
    

}
