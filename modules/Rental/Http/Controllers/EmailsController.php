<?php

namespace Modules\Rental\Http\Controllers;

use App\Http\Controllers\Controller;
use Request;

class EmailsController extends Controller
{
    public function reservation(Request $request)
    {
        $mail = Mail::send('emails.reservation.user', ['data' => (object)$request::all()], function ($m) {
            $m->from('kul@widimedia.com', 'Millennium Cars Website');

            $m->to('kul@widimedia.com', 'Enes Kul')->subject('Ein Käufer interessiert sich für ein Inserat!');
        });

        return \Response::json($mail);
    }
}