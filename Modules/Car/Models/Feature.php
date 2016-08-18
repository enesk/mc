<?php

namespace Modules\Car\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Feature extends Model
{
    use CrudTrait;

    protected $table = 'cars_features';
    protected $fillable = [
        'name',
        'slug'
    ];


    public static function findOrCreateByAPI($ad)
    {
        $apiFeatures = $ad->vehicle->features->feature;
        $features = [];
        foreach ($apiFeatures as $feature):
            if(!isset($feature->{'@key'}))
                continue;
            
            $featureData = [
                'name' => $feature->{'local-description'}->{'$'},
                'slug' => $feature->{'@key'},
            ];
            $check = self::where('slug', $featureData['slug'])->get();
            if ($check->isEmpty()):
                $created = self::create($featureData);
                $features[] = $created->id;
            else:
                $features[] = $check->first()->id;
            endif;

        endforeach;

        return $features;
    }


}