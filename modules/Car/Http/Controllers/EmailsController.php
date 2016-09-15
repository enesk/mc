<?php

namespace Modules\Car\Http\Controllers;

use App\Http\Controllers\Controller;
use Mail;

class EmailsController extends Controller
{
    public function interested(\Request $request)
    {
        $mail = Mail::send('emails.interested', ['data' => (object)$request::all()], function ($m) {
            $m->from('kul@widimedia.com', 'Millennium Cars Website');

            $m->to('kul@widimedia.com', 'Enes Kul')->subject('Ein Käufer interessiert sich für ein Inserat!');
        });

        return \Response::json($mail);
    }
}
