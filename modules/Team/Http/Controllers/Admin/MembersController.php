<?php

namespace Modules\Team\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use Modules\Team\Http\Requests\TeamRequest as StoreRequest;
use Modules\Team\Http\Requests\TeamRequest as UpdateRequest;

class MembersController extends CrudController
{

    public function __construct()
    {
        parent::__construct();

        $this->crud->setModel("Modules\Team\Models\Member");
        $this->crud->setRoute("admin/members");
        $this->crud->setEntityNameStrings('Member', 'Members');

        $this->crud->addColumn([
            'label' => 'Vorname',
            'name' => 'first_name'
        ]);

        $this->crud->addColumn([
            'label' => 'Nachname',
            'name' => 'last_name'
        ]);

        $this->crud->addField([ 
            'name' => 'first_name',
            'label' => "Vorname"
        ]);

        $this->crud->addField([
            'name' => 'last_name',
            'label' => "Nachname"
        ]);

        $this->crud->addField([
            'name' => 'position',
            'label' => "Position"
        ]);


        $this->crud->addField([
            'name' => 'tel',
            'label' => "Telefon"
        ]);

        $this->crud->addField([
            'name' => 'mail',
            'label' => "E-Mail"
        ]);

        $this->crud->addField([
            'name' => 'photo',
            'label' => "Bild",
            'type' => 'browse'
        ]);

        $this->crud->addField([
            'name' => 'team_id',
            'label' => 'Team',
            'type' => 'select2',
            'attribute' => 'name',
            'model' => "Modules\Team\Models\Team"
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
