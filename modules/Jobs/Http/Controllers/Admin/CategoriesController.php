<?php

namespace Modules\Jobs\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use Modules\Team\Http\Requests\TeamRequest as StoreRequest;
use Modules\Team\Http\Requests\TeamRequest as UpdateRequest;

class CategoriesController extends CrudController
{

    public function __construct()
    {
        parent::__construct();

        $this->crud->setModel("Modules\Jobs\Models\Category");
        $this->crud->setRoute("admin/jobs/categories");
        $this->crud->setEntityNameStrings('Categories', 'Category');

        $this->crud->setColumns(['title']);

        $this->crud->addField([
            'name' => 'title',
            'label' => "Titel"
        ]);
        
        $this->crud->addField([
            'name' => 'order',
            'label' => "Reihenfolge"
        ]);
    }

    public function store(StoreRequest $request)
    {
        return parent::storeCrud();
    }

    public function update(UpdateRequest $request)
    {
        return parent::updateCrud();
    }
}
