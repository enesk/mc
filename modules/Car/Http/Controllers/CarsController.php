<?php

namespace Modules\Car\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Car\Models\Car;
use Modules\Car\Models\Company;
use Modules\Car\Models\Specifics\Specific;

class CarsController extends Controller
{
    public function search(Request $request)
    {
        $companyID = \Request::get('company');
        if (!$companyID)
            return \Redirect::back()->with('error', 'Bitte eine Marke auswählen!');

        $companies = Company::all();
        $models = Company::find($companyID)->models;
        $fuels = Specific::where('name', 'fuel')->groupby('key')->get();
        $cars = Car::search($request->all());
        $year = date('Y');
        $data = [
            'cars' => $cars,
            'companies' => $companies,
            'fuels' => $fuels,
            'models' => $models,
            'year' => $year
        ];

        return view('sales::search', $data);

    }

    public function show($carID)
    {
        $car = Car::find($carID);
        if (!$car):
            return redirect('/');
        endif;
        $data = [
            'car' => $car
        ];

        return view('sales::show', $data);
    }
}
