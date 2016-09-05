<?php

namespace Modules\Site\Shortcodes;

use Modules\Team\Models\Team;

class TeamShortcode
{

    protected $defer = false;

    public function p($shortcode = '', $content = '', $compiler = '', $name = '')
    {
        $team = Team::all();
        $data = '<div class="col-xs-12"><h2>' . $team->name . '</h2></div>';
        foreach ($team->members as $member):
            $data .= '<div class="col-sm-4 text-center teamMember">';
            $data .= '<img alt="team" src="/' . $member->photo . '">';
            $data .= '<p>' . $member->position . '</p>';
            $data .= '<span>' . $member->first_name . ' ' . $member->last_name . '</span>';
            $data .= '<span>' . $member->tel . '</span>';
            $data .= '<span>' . $member->mail . '</span>';
            $data .= '</div>';
            $data .= '</div>';
        endforeach;
        return $data;
    }

}