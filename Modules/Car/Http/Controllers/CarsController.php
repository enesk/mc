<?php

namespace Modules\Car\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
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
}
