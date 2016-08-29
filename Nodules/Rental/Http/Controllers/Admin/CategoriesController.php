<?php

namespace Modules\Rental\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use Modules\Rental\Http\Requests\CategoryRequest as StoreRequest;
use Modules\Rental\Http\Requests\CategoryRequest as UpdateRequest;

class CategoriesController extends CrudController
{

    public function __construct()
    {
        parent::__construct();

        $this->crud->setModel("Modules\Rental\Models\Category");
        $this->crud->setRoute("admin/rental/categories");
        $this->crud->setEntityNameStrings('category', 'categories');

        $this->crud->setColumns(['name']);
        $this->crud->addField([
            'name' => 'name',
            'label' => "Name"
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
