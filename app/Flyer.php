<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flyer extends Model
{

    /**
     * Database table
     * @var string
     */
    protected $table = 'flyers';

    /**
     * Fillable fields
     * @var array
     */
    protected $fillable = [
        'street',
        'city',
        'zip' ,
        'state',
        'country',
        'price',
        'description'
        ];


    /**
     * This has many photos
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function photos()
    {
        return $this->hasMany('App\Photo');
    }
}
