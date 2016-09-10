<?php
namespace Modules\Slider\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Slider extends Model
{
    use CrudTrait;

    protected $table = 'sliders';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'slug',
        'order'
    ];

    public function slides()
    {
        return $this->hasMany(Slide::class);
    }

}