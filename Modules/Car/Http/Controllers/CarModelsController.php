<?php

namespace Modules\Car\Http\Controllers;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use Modules\Car\Http\Requests\ModelRequest as StoreRequest;
use Modules\Car\Http\Requests\ModelRequest as UpdateRequest;

class CarModelsController extends CrudController
{

    public function __construct()
    {
        parent::__construct();

        /*
		|---------------------------------------------------------  -----------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/
        $this->crud->setModel("Modules\Car\Models\Carmodel");
        $this->crud->setRoute("admin/models");
        $this->crud->setEntityNameStrings('model', 'models');

        /*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/
        $this->crud->setColumns(['title']);
        $this->crud->addField(
            [
                'name' => 'company_id',
                'label' => "Marke",
                'type' => 'select2',
                'entity' => 'company', // the method that defines the relationship in your Model
                'attribute' => 'title', // foreign key attribute that is shown to user
                'model' => "Modules\Car\Models\Company" // foreign key model
            ]
        );
        $this->crud->addField(
            [
                'name' => 'title',
                'label' => "Modell"
            ]
        );

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
