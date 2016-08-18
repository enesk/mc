<?php
/**
 * Created by PhpStorm.
 * User: efe
 * Date: 5/1/16
 * Time: 11:20 AM
 */

namespace Modules\Car\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{


    protected $table = 'cars_photos';
    protected $fillable = [
        'path',
        'car_id'
    ];

}