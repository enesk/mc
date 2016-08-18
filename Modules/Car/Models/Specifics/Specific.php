<?php

namespace Modules\Car\Models\Specifics;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Specific extends Model
{
    use CrudTrait;

    protected $table = 'cars_specifics';
    protected $fillable = [
        'name',
        'key',
        'value',
        'car_id'
    ];

    public static function findOrCreateByAPI($ad)
    {
        $companyData = [
            'name' => $ad->vehicle->make->{'local-description'}->{'$'},
            'slug' => $ad->vehicle->make->{'@key'},
        ];

        $company = Company::where('slug', $ad->vehicle->make->{'@key'});
        if ($company->get()->isEmpty()):
            $company = Company::create($companyData);
        endif;

        return $company->get()->first();
    }
}