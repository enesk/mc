<?php

namespace Modules\Page\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PagesController extends Controller
{
    public function getPage($slug)
    {
        if (Page::where('slug', '=', $slug)->count() != 0):
            $page = Page::where('slug', '=', $slug)->first();
            return \View::make($page->template, $page)->withShortcodes();
        else:
            \App::abort(404, 'Page Not Found');
        endif;
    }
}
