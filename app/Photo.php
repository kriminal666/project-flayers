<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{

    protected $table = 'flyer_photos';

    protected $fillable = [
        'path'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function flyers()
    {
    return $this->belongsTo('App\Flyer');
    }

}
