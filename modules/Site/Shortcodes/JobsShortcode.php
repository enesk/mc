<?php

namespace Modules\Site\Shortcodes;

use Modules\Jobs\Models\Job;

class JobsShortcode
{

    protected $defer = false;

    public function jobs($shortcode = '', $content = '', $compiler = '', $name = '')
    {
        $jobs = Job::all();
        $data = $this->listJobs($jobs);
        return $data;
    }

    public function listJobs($jobs)
    {
        $data = [
            'jobs' => $jobs
        ];
        return view('shortcodes::jobs.list', $data);
    }

}

?>
