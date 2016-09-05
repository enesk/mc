<?php
namespace Modules\Jobs\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Category extends Model
{
    use CrudTrait;

    protected $table = 'jobs_categories';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title',
        'order',
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jobs()
    {
        return self::hasMany(Job::class);
    }

}