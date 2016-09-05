<?php

namespace Modules\Page\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Page\Models\Page;

class PagesController extends Controller
{

    public function __construct()
    {
        \Shortcode::enable();
    }

    public function getPage($slug)
    {
        if (Page::where('slug', '=', $slug)->count() != 0):
            $page = Page::where('slug', '=', $slug)->first();
            return view($page->template_slug)->with('page', $page);
        else:
            \App::abort(404, 'Page Not Found');
        endif;
    }
}
