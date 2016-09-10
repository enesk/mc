<?php

namespace Modules\Menu\Http\Controllers\Admin;

use App\Http\Requests;
use Backpack\CRUD\app\Http\Controllers\CrudController;
// VALIDATION: change the requests to match your own file names if you need form validation
use Backpack\CRUD\app\Http\Requests\CrudRequest as StoreRequest;
use Backpack\CRUD\app\Http\Requests\CrudRequest as UpdateRequest;

class MenuCrudController extends CrudController
{
    public function __construct()
    {
        parent::__construct();

        $this->crud->setModel("Modules\Menu\Models\Menu");
        $this->crud->setRoute('admin/menu');
        $this->crud->setEntityNameStrings('menu', 'menus');

        $this->crud->addColumn([
            'name' => 'name',
            'label' => 'Label',
        ]);

        $this->crud->addField([
            'name' => 'name',
            'label' => 'Label',
        ]);

        $this->crud->addField([
            'name' => 'slug',
            'label' => 'Slug',
        ]);
    }

    public function store(StoreRequest $request)
    {
        return parent::storeCrud($request);
    }

    public function update(UpdateRequest $request)
    {
        return parent::updateCrud($request);
    }
}
