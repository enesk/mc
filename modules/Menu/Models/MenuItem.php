<?php

namespace Modules\Menu\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class MenuItem extends Model
{
    use CrudTrait;

    protected $table = 'menu_items';
    protected $fillable = ['name', 'type', 'link', 'page_id', 'parent_id', 'menu_id'];

    public function parent()
    {
        return $this->belongsTo('Modules\Menu\Models\MenuItem', 'parent_id');
    }

    public function scopeByMenu($query, $menuID) {
        return $query->where('menu_id', $menuID);
    }

    public function children()
    {
        return $this->hasMany('Modules\Menu\Models\MenuItem', 'parent_id');
    }

    public function page()
    {
        return $this->belongsTo('Modules\Page\Models\Page', 'page_id');
    }

    /**
     * Get all menu items, in a hierarchical collection.
     * Only supports 2 levels of indentation.
     */
    public static function getTree()
    {
        $menu = self::orderBy('lft')->get();

        if ($menu->count()) {
            foreach ($menu as $k => $menu_item) {
                $menu_item->children = collect([]);

                foreach ($menu as $i => $menu_subitem) {
                    if ($menu_subitem->parent_id == $menu_item->id) {
                        $menu_item->children->push($menu_subitem);

                        // remove the subitem for the first level
                        $menu = $menu->reject(function ($item) use ($menu_subitem) {
                            return $item->id == $menu_subitem->id;
                        });
                    }
                }
            }
        }

        return $menu;
    }

    public function url()
    {
        switch ($this->type) {
            case 'external_link':
                return $this->link;
                break;

            case 'internal_link':
                return url($this->link);
                break;

            default: //page_link
                return url($this->page->slug);
                break;
        }
    }
}
