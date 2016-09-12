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


    /**
     * @param $stationID
     * @return mixed
     */
    public static function getClassesByStationID($stationID)
    {
        return self::where('station_id', $stationID)
            ->where('cars_available', '>', 0)
            ->get();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function specifics() {
        return $this->hasMany(Specific::class);
    }
}