<?php

namespace Modules\Testimonial\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use Modules\Testimonial\Http\Requests\TestimonialRequest as StoreRequest;
use Modules\Testimonial\Http\Requests\TestimonialRequest as UpdateRequest;

class TestimonialsController extends CrudController
{

    public function __construct()
    {
        parent::__construct();

        $this->crud->setModel("Modules\Testimonial\Models\Testimonial");
        $this->crud->setRoute("admin/testimonials");
        $this->crud->setEntityNameStrings('Testimonial', 'Testimonials');

        $this->crud->setColumns(['name', 'testimonial']);
        $this->crud->addField([
            'name' => 'name',
            'label' => "Name"
        ]);
        $this->crud->addField([
            'name' => 'testimonial',
            'label' => "Kundenmeinung"
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
