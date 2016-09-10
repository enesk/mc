<?php

namespace Modules\Slider\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use Modules\Slider\Http\Requests\SliderRequest as StoreRequest;
use Modules\Slider\Http\Requests\SliderRequest as UpdateRequest;

class SlidersController extends CrudController
{

    public function __construct()
    {
        parent::__construct();

        $this->crud->setModel("Modules\Slider\Models\Slider");
        $this->crud->setRoute("admin/sliders");
        $this->crud->setEntityNameStrings('Slider', 'Sliders');

        $this->crud->setColumns(['name', 'slug']);
        $this->crud->addField([
            'name' => 'name',
            'label' => "Name"
        ]);

        $this->crud->addField([
            'name' => 'slug',
            'label' => "Slug"
        ]);

        $this->crud->addField([
            'name' => 'order',
            'label' => "Reihenfolge"
        ]);

        $this->crud->addButton('line', 'slides', 'view', 'crud::buttons.slides');
    }

    public function showDetailsRow($itemID)
    {
        $slides = new SlidesController();
        $this->data['crud'] = $slides->crud;
        // get all entries if AJAX is not enabled
        if (!$this->data['crud']->ajaxTable()) {
            $this->data['entries'] = $this->crud->getEntry($itemID)->slides;
        }


        return view('crud::list', $this->data);
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
