<?php

namespace Modules\Site\Http\Controllers;

use Mail;
use Illuminate\Routing\Controller;

class EmailsController extends Controller
{
    public function contact(\Request $request)
    {
        $mail = Mail::send('emails.interested', ['data' => (object)$request::all()], function ($m) {
            $m->from('kul@widimedia.com', 'Millennium Cars Website');

            $m->to('kul@widimedia.com', 'Enes Kul')->subject('Sie haben eine neue Nachricht!');
        });

        return \Response::json($mail);
    }

}
