<?php
namespace Modules\Slider\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Slide extends Model
{
    use CrudTrait;

    protected $table = 'sliders_slides';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title',
        'image',
        'slider_id',
        'order'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function slider()
    {
        return $this->belongsTo(Slider::class);
    }
}