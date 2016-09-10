<?php

namespace App\Helpers;


use Modules\Menu\Models\Menu as MenuModel;
use Modules\Slider\Models\Slider;

class Helper
{

    public static function themeUrl()
    {
        $theme = \Config::get('cartalyst.themes.active');
        $data = str_replace('::', '/', $theme);

        return 'themes/' . $data;
    }

    public static function assetsUrl($path = '')
    {
        return self::themeUrl() . '/assets' . $path;
    }


    public static function uploadsURL($path = '')
    {
        return '/uploads' . $path;
    }

    public static function smartPrice($price)
    {
        setlocale(LC_MONETARY, 'it_IT');
        $price = money_format('%.2n', $price);
        $removeEU = substr($price, 3);
        $data = substr($removeEU, 0, strpos($removeEU, ","));
        return $data;
    }

    public static function noneTax($price)
    {
        $noneTax = $price / 1.19;
        return $noneTax;
    }

    public static function kwToPS($kw)
    {
        $convert = $kw * 1.35962;
        $ps = substr($convert, 0, strpos($convert, "."));

        return $ps;
    }

    public static function getSlider($slug)
    {
        $slider = Slider::where('slug', $slug)->get();
        return $slider->first()->slides;
    }

}