<?php
namespace Modules\Rental\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class CarClass extends Model
{
    use CrudTrait;

    protected $table = 'rentals_cars_classes';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'details',
        'photo',
        'daily_price',
        'km_inclusive',
        'extra_km_price',
        'cars_available',
        'category_id',
        'station_id',
        'specifics',
        'order',
    ];

}