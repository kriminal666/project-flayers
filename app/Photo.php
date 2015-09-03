<?php

namespace App;

use Image;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Photo extends Model
{

    /**
     * Database table
     *
     * @var string
     */
    protected $table = 'flyer_photos';

    /**
     * Fillable fields
     *
     * @var array
     */
    protected $fillable = [
        'path',
        'name',
        'thumbnail_path'
    ];

    /**
     * Base path to images
     *
     * @var string
     */
    protected $baseDir = 'images/home_pics';


    /**
     * Get instance from form
     *
     * @param $name
     * @return static
     * @internal param UploadedFile $file
     */
    public static function named($name)
    {

        return (new static)->saveAs($name);

    }

    /**
     * Set values to this
     *
     * @param $name
     * @return $this
     */
    public function saveAs($name)
    {

        $this->name = sprintf("%s-%s", time(), $name);
        $this->path =sprintf("%s/%s", $this->baseDir, $this->name);
        $this->thumbnail_path = sprintf("%s/tn-%s", $this->baseDir, $this->name);

        return $this;

    }

    /**
     * Move photo
     *
     * @param UploadedFile $file
     * @return $this
     */
    public function move(UploadedFile $file)
    {

        $file->move($this->baseDir, $this->name);

       $this->makeThumbnail();

        return $this;

    }

    /**
     * Generate thumbnail
     *
     */
    private function makeThumbnail()
    {

        Image::make($this->path)
            ->fit(200)
            ->save($this->thumbnail_path);
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function flyers()
    {

        return $this->belongsTo('App\Flyer');

    }


}
