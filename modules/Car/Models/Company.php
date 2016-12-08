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

    public function models()
    {
        return $this->hasMany(CarModel::class)->orderBy('name', 'asc');
    }

    public static function findOrCreateByAPI($ad)
    {
        $companyData = [
            'name' => $ad->vehicle->make->{'local-description'}->{'$'},
            'slug' => $ad->vehicle->make->{'@key'},
        ];

        $check = self::where('slug', $companyData['slug']);
        if ($check->get()->isEmpty()):
            $company = self::create($companyData);
            return $company;
        endif;

        return $check->first();
    }
}