<?php

namespace Modules\Slider\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use Modules\Slider\Http\Requests\SlideRequest as StoreRequest;
use Modules\Slider\Http\Requests\SlideRequest as UpdateRequest;

class SlidesController extends CrudController
{

    public function __construct()
    {
        parent::__construct();

        $this->crud->setModel("Modules\Slider\Models\Slide");
        $this->crud->setRoute("admin/slides");
        $this->crud->setEntityNameStrings('Slide', 'Slides');

        $this->crud->setColumns(['title']);
        $this->crud->addField([
            'name' => 'title',
            'label' => "Name"
        ]);

        $this->crud->addField([
            'name' => 'image',
            'label' => "Image",
            'type' => 'browse'
        ]);

        $this->crud->addField([
            'name' => 'slider_id',
            'label' => 'Slider',
            'type' => 'select2',
            'attribute' => 'name',
            'model' => "Modules\Slider\Models\Slider"
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
