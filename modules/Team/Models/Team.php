<?php
namespace Modules\Team\Models;

use Backpack\CRUD\CrudTrait;
use Modules\Rental\Models\Station;


class Team extends \Eloquent
{
    use CrudTrait;

    protected $table = 'teams';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'station_id',
        'order'
    ];
    
    public function members() {
        return self::hasMany(Member::class);
    }
    
    public function station() {
        return self::belongsTo(Station::class);
    }

}