<?php
namespace Modules\Rental\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Specific extends Model
{
    use CrudTrait;

    protected $table = 'rentals_cars_classes_specifics';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'key'
    ];

}