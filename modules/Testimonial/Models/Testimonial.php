<?php
namespace Modules\Testimonial\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Testimonial extends Model
{
    use CrudTrait;

    protected $table = 'testimonials';
    protected $primaryKey = 'id';
    protected $fillable = [
        'testimonial',
        'name',
        'order'
    ];

}