<?php

namespace App\Helpers;

use Modules\Menu\Models\Menu;

class MenuHelper
{

    public static function getMenu($slug)
    {
        $items = self::getItems($slug);
        $data = [
            'items' => $items
        ];

        echo view('partials.navigation.menu', $data);
    }

    public static function getSidebarMenu($menuID) {
        $items = Menu::find($menuID)->items;
        $data = [
            'items' => $items
        ];

        echo view('partials.navigation.sidebar', $data);
    }

    /**
     * @param $page
     * @return string
     */
    public static function isSelected($page)
    {
        if (\Request::is($page->slug.'/*') or \Request::is($page->slug))
            return true;

        return false;
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