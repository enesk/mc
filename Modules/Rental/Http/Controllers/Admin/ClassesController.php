<?php

namespace Modules\Rental\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use Modules\Rental\Http\Requests\CategoryRequest as StoreRequest;
use Modules\Rental\Http\Requests\CategoryRequest as UpdateRequest;

class ClassesController extends CrudController
{

    public function __construct()
    {
        parent::__construct();


        $this->crud->setModel("Modules\Rental\Models\CarClass");
        $this->crud->setRoute("admin/rental/classes");
        $this->crud->setEntityNameStrings('class', 'classes');

        $this->crud->setColumns(['name']);

        $this->crud->addColumn([
            'name' => 'station_id', // The db column name
            'label' => "Station", // Table column heading
            'type' => 'stations'
        ]);
        $this->crud->addField([
            'name' => 'name',
            'label' => "Name"
        ]);

        $this->crud->addField([
            'name' => 'details',
            'label' => "Kurzbeschreibung"
        ]);

        $this->crud->addField([
            'name' => 'photo',
            'label' => "Bild",
            'type' => 'browse'
        ]);

        $this->crud->addField([
            'name' => 'daily_price',
            'label' => "Preis pro Tag in Euro"
        ]);

        $this->crud->addField([
            'name' => 'km_inclusive',
            'label' => "Inklusive Kilometer"
        ]);

        $this->crud->addField([
            'name' => 'cars_available',
            'label' => "Bestand"
        ]);

        $this->crud->addField([
            'name' => 'category_id',
            'label' => 'Kategorie',
            'type' => 'select2',
            'attribute' => 'name', // foreign key attribute that is shown to user
            'model' => "Modules\Rental\Models\Category" // foreign key model
        ]);

        $this->crud->addField([
            'name' => 'station_id',
            'label' => 'Station',
            'type' => 'select2',
            'attribute' => 'city', // foreign key attribute that is shown to user
            'model' => "Modules\Rental\Models\Station" // foreign key model
        ]);

        $this->crud->addField([
            'label' => 'Ausstatung',
            'name' => 'specific',
            'entity' => 'specific',
            'attribute' => 'name',
            'model' => "Modules\Rental\Models\Specific",
            'type' => 'specifics'
        ]);

        $this->crud->addField([
            'name' => 'order',
            'label' => "Reihenfolge"
        ]);

    }

    public function store(StoreRequest $request)
    {
        $this->parseSpecifics($request);
        return parent::storeCrud($request);
    }

    public function update(UpdateRequest $request)
    {
        $this->parseSpecifics($request);
        return parent::updateCrud($request);
    }

    public function parseSpecifics($request) {
        $specifics = json_encode($request->get('specific'));
        $request->merge(['specifics' => $specifics]);
        $request->request->remove('specific');
    }

}
