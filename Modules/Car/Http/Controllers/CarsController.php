<?php

namespace Modules\Car\Http\Controllers;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use Modules\Car\Http\Requests\CarRequest as StoreRequest;
use Modules\Car\Http\Requests\CarRequest as UpdateRequest;

class CarsController extends CrudController
{

    public function __construct()
    {
        parent::__construct();

        /*
		|---------------------------------------------------------  -----------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/
        $this->crud->setModel("Modules\Car\Models\Car");
        $this->crud->setRoute("admin/cars");
        $this->crud->setEntityNameStrings('car', 'cars');

        /*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/
        $this->crud->setColumns(['company_id', 'model_id', 'year']);
        $this->crud->addField(
            [
                'name' => 'category_id',
                'label' => "Kategorie",
                'type' => 'select2',
                'entity' => 'category', // the method that defines the relationship in your Model
                'attribute' => 'title', // foreign key attribute that is shown to user
                'model' => "Modules\Car\Models\Category" // foreign key model
            ]
        );
        $this->crud->addField(
            [
                'name' => 'class_id',
                'label' => "Klasse",
                'type' => 'select2',
                'entity' => 'carClass', // the method that defines the relationship in your Model
                'attribute' => 'title', // foreign key attribute that is shown to user
                'model' => "Modules\Car\Models\CarClass" // foreign key model
            ]
        );
        $this->crud->addField(
            [
                'name' => 'company_id',
                'label' => "Marke",
                'type' => 'select2',
                'entity' => 'carCompany', // the method that defines the relationship in your Model
                'attribute' => 'title', // foreign key attribute that is shown to user
                'model' => "Modules\Car\Models\Company" // foreign key model
            ]
        );
        $this->crud->addField(
            [
                'name' => 'model_id',
                'label' => "Modell",
                'type' => 'select2',
                'entity' => 'carModel', // the method that defines the relationship in your Model
                'attribute' => 'title', // foreign key attribute that is shown to user
                'model' => "Modules\Car\Models\CarModel" // foreign key model
            ]
        );
        $this->crud->addField(
            [
                'name' => 'year',
                'label' => "Baujahr"
            ]
        );
        $this->crud->addField(
            [
                'name' => 'license_plate',
                'label' => "Kennzeichen"
            ]
        );
        $this->crud->addField(
            [
                'name' => 'maxSeat',
                'label' => "Sitze"
            ]
        );
        $this->crud->addField(
            [
                'name' => 'dailyPrice',
                'label' => "Preis"
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
