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
        return $this->belongsTo(\Modules\Car\Models\Company::class);
    }

    public static function findOrCreateByAPI($ad, $companyID)
    {
        $companyData = [
            'name' => $ad->vehicle->model->{'local-description'}->{'$'},
            'slug' => $ad->vehicle->model->{'@key'},
            'company_id' => $companyID
        ];

        $model = CarModel::where('slug', $ad->vehicle->model->{'@key'})->get();
        if ($model->isEmpty()):
            $model = CarModel::create($companyData);
        endif;

        return $model->first();
    }

}