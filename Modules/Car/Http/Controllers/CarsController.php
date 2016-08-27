<?php

namespace Modules\Car\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Car\Models\Car;
use Modules\Car\Models\Company;

class CarsController extends Controller
{
    public function search(Request $request)
    {
        $companyID = \Request::get('company');
        if (!$companyID)
            return redirect('/home')->with('error', 'Bitte eine Marke auswählen!');

        $companies = Company::all();
        $models = Company::find($companyID)->models;
        $fuels = \Modules\Car\Models\Specifics\Specific::where('name', 'fuel')->groupby('key')->get();
        $cars = Car::search($request->all());
        $year = date('Y');
        $data = [
            'cars' => $cars,
            'companies' => $companies,
            'fuels' => $fuels,
            'models' => $models,
            'year' => $year
        ];

        return view('rental::search', $data);

    }

    public function show($carID)
    {
        $car = Car::find($carID);

        $data = [
            'car' => $car
        ];

        return view('rental::show', $data);
    }
}
