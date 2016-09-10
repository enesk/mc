<?php

namespace Modules\Menu\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Menu extends Model
{
    use CrudTrait;

    protected $table = 'menus';
    protected $fillable = ['name', 'slug'];
    

    public function items()
    {
        return $this->hasMany('Modules\Menu\Models\MenuItem')->orderBy('rgt');
    }
}
