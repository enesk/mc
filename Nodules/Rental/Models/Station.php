<?php
namespace Modules\Rental\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Station extends Model
{
    use CrudTrait;

    protected $table = 'rentals_stations';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'street',
        'houseno',
        'zipcode',
        'city',
        'tel',
        'order',
        'openings',
    ];

}