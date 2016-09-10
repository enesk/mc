<?php

namespace Modules\Rental\Http\Controllers;

use Illuminate\Routing\Controller;
use Symfony\Component\Console\Input\Input;

class RentalsController extends Controller
{
    public function search()
    {
        #dd(\Request::all());

        return view('rental::search');
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