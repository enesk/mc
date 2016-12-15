<?php

namespace Modules\Site\Shortcodes;

use Modules\Team\Models\Team;

class TeamShortcode
{

    protected $defer = false;

    public function profiles($shortcode = '', $content = '', $compiler = '', $name = '')
    {
        $teams = Team::all();
        $data = '<div class="row aboutUs_table">';
        foreach ($teams as $team):
            $data .= '<div class="col-xs-12"><h2>' . $team->name . ' - ' . $team->station->city . '</h2></div>';
            foreach ($team->members as $member):
                $data .= '<div class="col-sm-4 text-center teamMember">';
                if (!empty($member->photo)):
                    $data .= '<img class="img-circle" alt="team" src="/' . $member->photo . '">';
                endif;
                $data .= '<p>' . $member->position . '</p>';
                $data .= '<span>' . $member->first_name . ' ' . $member->last_name . '</span>';
                $data .= '<span>' . $member->tel . '</span>';
                $data .= '<span>' . $member->mail . '</span>';
                $data .= '</div>';
            endforeach;
        endforeach;
        $data .= '</div>';

        return $data;
    }

}