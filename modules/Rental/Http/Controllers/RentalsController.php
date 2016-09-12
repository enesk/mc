<?php

namespace Modules\Rental\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Rental\Models\CarClass;
use Modules\Rental\Models\Category;
use Symfony\Component\Console\Input\Input;

class RentalsController extends Controller
{
    public function search()
    {
        $request = \Request::all();
        $classes = CarClass::getClassesByStationID($request['from_station']);
        $categories = Category::orderBy('order')->get();
        $data = [
            'classes' => $classes,
            'days' => $request['days'],
            'categories' => $categories,
            'reservationDates' => $request
        ];
        return view('rental::search', $data);
    }

    public function extras()
    {
        return view('rental::extras');
    }

    public function check()
    {
        return view('rental::check');
    }

    public function thanks()
    {
        return view('rental::thanks');
    }
}