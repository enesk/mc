<?php
namespace Modules\Car\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use Modules\Car\Models\Specifics\Specific;

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
        'mileage',
        'power',
        'vatable',
        'damaged_and_unrepaired',
        'category_id',
        'company_id',
        'model_id',
        'mobile_id'
    ];

    public static function newCars()
    {
        $cars = self::groupBy('title')->get()->take(10);

        return $cars;
    }

    public static function search($data)
    {
        $cars = self::take(100);
        if (!empty($data['company']))
            $cars = $cars->where('company_id', $data['company']);
        if (!empty($data['model']))
            $cars = $cars->where('model_id', $data['model']);
        if (!empty($data['fuel']))
            $cars = $cars->whereHas('specifics', function ($q) use ($data) {
                $q->where('key', $data['fuel']);
            });
        if (!empty($data['year']))
            $cars = $cars->whereDate('first_registration', '<=', Carbon::createFromFormat('Y', $data['year'])->toDateString());
        if (!empty($data['priceRange'])):
            $data = explode(';', $data['priceRange']);
            $cars = $cars->whereBetween('price', [$data[0], $data[1]]);
        endif;

        return $cars->get();
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }


    public function company()
    {
        return $this->hasOne('Modules\Car\Models\Company', 'company_id', 'id');
    }


    public function carClass()
    {
        return $this->belongsTo('Modules\Car\Models\carClass', 'class_id', 'id');
    }

    public function specifics()
    {
        return $this->hasMany(Specific::class);
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