<?php

namespace Modules\Site\Shortcodes;

class ContactShortcode
{

    protected $defer = false;

    public function contact($shortcode = '', $content = '', $compiler = '', $name = '')
    {
        return view('shortcodes::contact')->render();
    }

}

?>
