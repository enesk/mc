<?php

namespace App\Helpers;

use Modules\Menu\Models\Menu;

class MenuHelper
{

    public static function getMenu($slug, $type = '')
    {
        $items = self::getItems($slug);
        $data = [
            'items' => $items,
            'slug' => $slug
        ];

        switch ($slug):
            case 'footer':
                echo view('partials.navigation.footer', $data)->render();
                break;
            default:
                if ($type == 'li'):
                    echo view('partials.navigation.li', $data)->render();
                else:
                    echo view('partials.navigation.menu', $data)->render();
                endif;
        endswitch;
    }

    public static function getSidebarMenu($menuID)
    {
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
        if (!isset($page->slug))
            return false;
        if (\Request::is($page->slug . '/*') or \Request::is($page->slug) or \Request::is('*/' . $page->slug))
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