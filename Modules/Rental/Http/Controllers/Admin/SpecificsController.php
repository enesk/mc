<?php

namespace Modules\Rental\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use Modules\Rental\Http\Requests\CategoryRequest as StoreRequest;
use Modules\Rental\Http\Requests\CategoryRequest as UpdateRequest;

class SpecificsController extends CrudController
{

    public function __construct()
    {
        parent::__construct();

        $this->crud->setModel("Modules\Rental\Models\Specific");
        $this->crud->setRoute("admin/rental/specifics");
        $this->crud->setEntityNameStrings('specific', 'specifics');

        $this->crud->setColumns(['name']);

        $this->crud->addField([
            'name' => 'key',
            'label' => "Schlüsselwort"
        ]);

        $this->crud->addField([
            'name' => 'name',
            'label' => "Name"
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
