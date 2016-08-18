<?php

namespace Modules\Car\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Company extends Model
{
    use CrudTrait;

    protected $table = 'cars_companies';
    protected $fillable = [
        'name',
        'slug'
    ];

    public function carModel()
    {
        return $this->hasMany('CarModel', 'id', 'company_id');
    }

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