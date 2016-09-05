<?php

namespace Modules\Jobs\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use Modules\Team\Http\Requests\TeamRequest as StoreRequest;
use Modules\Team\Http\Requests\TeamRequest as UpdateRequest;

class JobsController extends CrudController
{

    public function __construct()
    {
        parent::__construct();

        $this->crud->setModel("Modules\Jobs\Models\Job");
        $this->crud->setRoute("admin/jobs");
        $this->crud->setEntityNameStrings('Job', 'Jobs');

        $this->crud->setColumns(['title']);

        $this->crud->addField([
            'name' => 'title',
            'label' => "Titel"
        ]);

        $this->crud->addField([
            'name' => 'content',
            'label' => "Inhalt",
            'type' => 'wysiwyg'
        ]);
        
        $this->crud->addField([
            'name' => 'station_id',
            'label' => 'Station',
            'type' => 'select2',
            'attribute' => 'city', // foreign key attribute that is shown to user
            'model' => "Modules\Rental\Models\Station" // foreign key model
        ]);
        
        $this->crud->addField([
            'name' => 'category_id',
            'label' => 'Category',
            'type' => 'select2',
            'attribute' => 'title', // foreign key attribute that is shown to user
            'model' => "Modules\Jobs\Models\Category" // foreign key model
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
