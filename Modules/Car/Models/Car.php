<?php
namespace Modules\Car\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Car extends Model
{
    use CrudTrait;

    protected $table = 'cars';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title',
        'description',
        'first_registration',
        'price',
        'milage',
        'power',
        'vatable',
        'damaged_and_unrepaired',
        'category_id',
        'company_id',
        'model_id',
        'mobile_id'
    ];


    public function company()
    {
        return $this->hasOne('Modules\Car\Models\Company', 'company_id', 'id');
    }


    public function carClass()
    {
        return $this->belongsTo('Modules\Car\Models\carClass', 'class_id', 'id');
    }


    public function category()
    {
        return $this->belongsTo('Modules\Car\Models\Category', 'category_id', 'id');
    }

    public function model()
    {
        return $this->hasOne('Modules\Car\Models\CarModel', 'id', 'model_id');
    }

    public function features()
    {
        return $this->belongsToMany(Feature::class, 'cars_features_cars');
    }

}