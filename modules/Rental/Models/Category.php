<?php
namespace Modules\Rental\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Category extends Model
{
    use CrudTrait;

    protected $table = 'rentals_cars_categories';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'slug',
        'order',
    ];
    
    public function carClasses() {
        return $this->hasMany(CarClass::class);
    } 

}