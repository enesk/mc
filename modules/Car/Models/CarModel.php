<?php

namespace Modules\Car\Models;


use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class CarModel extends Model
{
    use CrudTrait;

    protected $table = 'cars_models';
    protected $primaryKey = 'id';
    protected $fillable = [
        'company_id',
        'name',
        'slug'
    ];


    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    
    public function cars() {
        return $this->hasMany(Car::class);
    }

    public static function findOrCreateByAPI($ad, $companyID)
    {
        $modelData = [
            'name' => $ad->vehicle->model->{'local-description'}->{'$'},
            'slug' => $ad->vehicle->model->{'@key'},
            'company_id' => $companyID
        ];

        $check = CarModel::where('slug', $modelData['slug']);
        if ($check->get()->isEmpty()):
            $carModel = CarModel::create($modelData);
            return $carModel;
        endif;

        return $check->first();
    }

}