<?php

namespace Modules\Rental\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Rental\Models\CarClass;
use Modules\Rental\Models\Category;
use Request;

class RentalsController extends Controller
{
    public function search(Request $request)
    {
        $requestData = $request::all();
        if (!$requestData['from_station'])
            return \Redirect::back()->with('error', 'Bitte wählen Sie ein Station!');
        \Session::set('reservation', $requestData);
        if (!$requestData['to_station'])
            \Session::set('reservation.to_station', $requestData['from_station']);

        $classes = CarClass::getClassesByStationID($requestData['from_station']);
        $categories = Category::orderBy('order')->get();
        $data = [
            'classes' => $classes,
            'days' => $requestData['days'],
            'categories' => $categories,
            'reservationDates' => $requestData
        ];

        return view('rental::search', $data);
    }

    public function extras($classID)
    {
        \Session::set('reservation.classID', $classID);
        $carClass = CarClass::find($classID);
        $data = [
            'car' => $carClass
        ];
        \Session::set('reservation.freeKM', $carClass->km_inclusive * session('reservation.days'));
        \Session::set('reservation.totalPrice', $carClass->daily_price * session('reservation.days'));
        return view('rental::extras', $data);
    }

    public function check(\Request $request)
    {
        $requestData = $request::all();
        if(isset($requestData['extras']))
            \Session::set('reservation.extras', $requestData['extras']);

        $carClass = CarClass::find(session('reservation.classID'));
        $data = [
            'car' => $carClass
        ];
        return view('rental::check', $data);
    }

    public function thanks(\Request $request)
    {
        $requestData = $request::all();
        \Session::set('reservation.personal', $requestData);
       // dd(session('reservation'));
        return view('rental::thanks');
    }
}