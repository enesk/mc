<?php

namespace Modules\Site\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Car\Models\CarModel;
use Modules\Car\Models\Company;

class ApiController extends Controller
{
    public function getModels()
    {
        $companyID = \Request::get('companyID');
        $company = Company::find($companyID);
        
        return \Response::json($company->models->toArray());
    }
}
