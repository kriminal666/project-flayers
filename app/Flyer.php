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
     * Format price
     * @param $price
     * @return string
     */
    public function getPriceAttribute($price)
    {
        return number_format($price);
    }


    /**
     * @param Photo $photo
     * @return Model
     */
    public function addPhoto(Photo $photo)
    {
        return $this->photos()->save($photo);
    }
    /**
     * @param $zip
     * @param $street
     * @return mixed
     * @internal param $query
     */
    public static function locatedAt($zip, $street)
    {
        $street = str_replace('-',' ',$street);

        return static::where(compact('zip', 'street'))->first();

    }

    /**
     * This has many photos
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function photos()
    {
        return $this->hasMany('App\Photo');
    }
}
