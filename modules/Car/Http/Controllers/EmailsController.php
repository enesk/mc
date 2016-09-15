<?php

namespace Modules\Car\Http\Controllers;

use App\Http\Controllers\Controller;

class EmailsController extends Controller
{
   public function interested(\Request $request) {
        return \Response::json($request::all());
   }
}
