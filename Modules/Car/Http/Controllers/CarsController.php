<?php

namespace Modules\Car\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Car\Models\Car;

class CarsController extends Controller
{
    public function search(Request $request) {
        $cars = Car::search($request->all());
        $data = [
            'cars' => $cars
        ];

        return view('rental::list', $data);

    }

    public function show($carID) {
        $car = Car::find($carID);

        $data = [
            'car' => $car
        ];

        return view('rental::show', $data);
    }
}
