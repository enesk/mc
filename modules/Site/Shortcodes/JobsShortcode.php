<?php

namespace Modules\Site\Shortcodes;

use Modules\Jobs\Models\Category;
use Modules\Jobs\Models\Job;

class JobsShortcode
{

    protected $defer = false;

    public function jobs($shortcode = '', $content = '', $compiler = '', $name = '')
    {
        $jobs = Job::all();
        $data = '<div class="col-xs-12 career_table">';
        $data .= '<div class="careerTable">';
        $data .= '<table class="table table-striped">';
        $data .= '<thead>';
        $data .= '<tr>';
        $data .= '<th>Stellenbezeichnung</th>';
        $data .= '<th>Standort</th>';
        $data .= '<th>Unternehmensbereich</th>';
        $data .= '</tr>';
        $data .= '</thead>';
        $data .= '<tbody>';
        foreach ($jobs as $job):
            $data .= '<tr data-href="#" class="toDetail">';
            $data .= '<td>' . $job->title . '</td>';
            $data .= '<td>' . $job->station->city . '</td>';
            $data .= '<td>' . $job->category->title . '<i aria-hidden="true" class="fa fa-angle-right"></i></td>';
            $data .= '</tr>';
        endforeach;
        $data .= '</tbody>';
        $data .= '</table>';
        $data .= '</div>';
        $data .= '</div>';
        return $data;
    }

}

?>
