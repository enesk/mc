<?php

namespace Modules\Team\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use Modules\Team\Http\Requests\TeamRequest as StoreRequest;
use Modules\Team\Http\Requests\TeamRequest as UpdateRequest;

class TeamsController extends CrudController
{

    public function __construct()
    {
        parent::__construct();

        $this->crud->setModel("Modules\Team\Models\Team");
        $this->crud->setRoute("admin/teams");
        $this->crud->setEntityNameStrings('Team', 'Teams');

        $this->crud->setColumns(['name']);
        $this->crud->addColumn([
            'name' => 'station_id',
            'label' => "Station",
            'type' => 'stations'
        ]);

        $this->crud->addField([ 
            'name' => 'name',
            'label' => "Name"
        ]);

        $this->crud->addField([
            'name' => 'station_id',
            'label' => 'Station',
            'type' => 'select2',
            'attribute' => 'city', // foreign key attribute that is shown to user
            'model' => "Modules\Rental\Models\Station" // foreign key model
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
