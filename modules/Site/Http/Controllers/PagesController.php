<?php

namespace Modules\Site\Http\Controllers;

use Backpack\PageManager\app\Models\Page;
use Illuminate\Routing\Controller;

class PagesController extends Controller
{

    public function getPage($slug)
    {
        if (Page::where('slug', '=', $slug)->count() != 0):
            $page = Page::where('slug', '=', $slug)->first();
            return \View::make($page->template)->with('page', $page);
        else:
            \App::abort(404, 'Page Not Found');
        endif;
    }
}