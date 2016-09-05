<?php
namespace Modules\Jobs\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use Modules\Rental\Models\Station;

class Job extends Model
{
    use CrudTrait;

    protected $table = 'jobs';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title',
        'content',
        'station_id',
        'category_id',
        'order'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category() {
        return self::belongsTo(Category::class);
    }
    
    public function station() {
        return self::belongsTo(Station::class);
    }
}