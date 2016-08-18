<?php

namespace Modules\Car\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Category extends Model
{
    use CrudTrait;

    protected $table = 'cars_categories';
    protected $fillable = [
        'name',
        'slug'
    ];


    public static function findOrCreateByAPI($ad)
    {
        $categoryData = [
            'name' => $ad->vehicle->category->{'local-description'}->{'$'},
            'slug' => $ad->vehicle->category->{'@key'},
        ];

        $category = self::where('slug', $ad->vehicle->category->{'@key'})->get();
        if ($category->isEmpty()):
            $category = self::create($categoryData);
        endif;

        return $category->first();
    }


}