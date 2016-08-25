<?php

namespace App\Helpers;


class Helper
{

    public static function themeUrl()
    {
        $theme = \Config::get('cartalyst.themes.active');
        $data = str_replace('::', '/', $theme);

        return 'themes/' . $data;
    }

    public static function assetsUrl()
    {
        return self::themeUrl() . '/assets';
    }

    public static function smartPrice($price)
    {
        setlocale(LC_MONETARY, 'it_IT');
        $price = money_format('%.2n', $price);
        $removeEU = substr($price, 3);
        $data = substr($removeEU, 0, strpos($removeEU, ","));
        return $data;
    }

}