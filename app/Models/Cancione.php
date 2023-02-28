<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cancione
 *
 * @property $id
 * @property $nombre
 * @property $cantante_id
 * @property $playlist_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Cantante $cantante
 * @property Playlist $playlist
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cancione extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'cantante_id' => 'required',
		'playlist_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','cantante_id','playlist_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cantante()
    {
        return $this->hasOne('App\Models\Cantante', 'id', 'cantante_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function playlist()
    {
        return $this->hasOne('App\Models\Playlist', 'id', 'playlist_id');
    }
    

}
