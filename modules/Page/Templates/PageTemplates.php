<?php

namespace Modules\Page\Templates;

trait PageTemplates
{
    /*
    |--------------------------------------------------------------------------
    | Page Templates for Backpack\PageManager
    |--------------------------------------------------------------------------
    |
    | Each page template has its own method, that define what fields should show up using the Backpack\CRUD API.
    | Use snake_case for naming and PageManager will make sure it looks pretty in the create/update form
    | template dropdown.
    |
    | Any fields defined here will show up after the standard page fields:
    | - select template
    | - page name (only seen by admins)
    | - page title
    | - page slug
    */
    private function no()
    {

    }
    private function standard()
    {
        $this->crud->addField([
            'name' => 'content',
            'label' => 'Inhalt',
            'type' => 'wysiwyg',
        ]);
        
    }
}
