<?php

namespace Modules\Car\Http\Controllers;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use Modules\Car\Http\Requests\CompanyRequest as StoreRequest;
use Modules\Car\Http\Requests\CompanyRequest as UpdateRequest;

class CompaniesController extends CrudController
{

    public function __construct()
    {
        parent::__construct();

        /*
		|---------------------------------------------------------  -----------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/
        $this->crud->setModel("Modules\Car\Models\Company");
        $this->crud->setRoute("admin/companies");
        $this->crud->setEntityNameStrings('company', 'companies');

        /*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/
        $this->crud->setColumns(['title']);
        $this->crud->addField(
            [
                'name' => 'title',
                'label' => "Marke"
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
