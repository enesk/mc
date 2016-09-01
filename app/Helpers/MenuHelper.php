<?php

namespace App\Helpers;

use Modules\Page\Models\Page;
use Modules\Menu\Models\Menu;

class MenuHelper
{

    public static function getMenu($slug)
    {
        $items = self::getItems($slug);
        echo '<ul class="list-inline subHdrMenu">';
        foreach ($items as $item):
            $page = Page::find($item->page_id);
            $url = self::getUrl($item, $page);
            $selected = self::isSelected($page);
            self::makeHtml($selected, $url, $item);
        endforeach;
        echo '</ul>';
    }

    /**
     * @param $page
     * @return string
     */
    public static function isSelected($page)
    {
        if (\Request::is($page->slug)):
            $selected = 'selected';
        else:
            $selected = '';
        endif;

        return $selected;
    }

    /**
     * @param $item
     * @param $page
     * @return string
     */
    public static function getUrl($item, $page)
    {
        if ($item->type == 'page_link'):
            $url = \URL::to($page->slug);
        else:
            $url = $item->link;
        endif;

        return $url;
    }

    /**
     * @param $selected
     * @param $url
     * @param $item
     */
    public static function makeHtml($selected, $url, $item)
    {
        echo '<li class="hidden-xs ' . $selected . '"><a href="' . $url . '">' . $item->name . '</a></li>';
    }

    /**
     * @param $slug
     * @return mixed
     */
    public static function getItems($slug)
    {
        $menu = Menu::where('slug', $slug)->get()->first();
        $items = $menu->items;;
        return $items;
    }
}