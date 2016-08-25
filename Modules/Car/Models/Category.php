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

        $check = self::where('slug', $categoryData['slug']);
        if ($check->get()->isEmpty()):
            $category = self::create($categoryData);
            return $category;
        endif;

        return $check->first();
    }


}