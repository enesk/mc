<?php

namespace Modules\Jobs\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Jobs\Models\Job;

class JobsController extends Controller
{
    public function view($jobID)
    {
        $job = Job::find($jobID);
        if ($job->count() != 0):
            $data = [
                'content' => $this->show($jobID),
                'header_bg' => '/uploads/backgrounds/headers/career.jpg',
                'title' => $job->title,
                'sidebar_menu_id' => 3
            ];

            return view('templates::standard')->with('page', (object)$data);
        else:
            \App::abort(404, 'Page Not Found');
        endif;
    }

    public function show($jobID)
    {
        $data = [
            'job' => Job::find($jobID)
        ];
        return view('shortcodes::jobs.show', $data);
    }

}
