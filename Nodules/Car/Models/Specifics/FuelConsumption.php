<?php

namespace Modules\Car\Models\Specifics;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class FuelConsumption extends Model
{
    use CrudTrait;

    protected $table = 'cars_specifics_fuel_consumptions';
    protected $fillable = [
        'envkv_compliant',
        'co2_emission',
        'inner',
        'outer',
        'combined',
        'car_id',
    ];


}