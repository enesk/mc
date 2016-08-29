<?php

namespace Modules\Site\Http\Controllers;

use Backpack\PageManager\app\Models\Page;
use Illuminate\Routing\Controller;

class PagesController extends Controller
{
    public function getPage($slug = null)
    {
        $page = Page::where('slug', $slug);

        $page = $page->firstOrFail();

        return \View::make($page->template)->with('page', $page);
    }
}