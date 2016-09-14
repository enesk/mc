<?php

namespace Modules\Menu\Http\Controllers\Admin;

use App\Http\Requests;
use Backpack\CRUD\app\Http\Controllers\CrudController;
// VALIDATION: change the requests to match your own file names if you need form validation
use Backpack\CRUD\app\Http\Requests\CrudRequest as StoreRequest;
use Backpack\CRUD\app\Http\Requests\CrudRequest as UpdateRequest;

class MenuItemCrudController extends CrudController
{
    public function __construct()
    {
        parent::__construct();

        $this->crud->setModel("Modules\Menu\Models\MenuItem");
        $this->crud->setRoute('admin/menu-item');
        $this->crud->setEntityNameStrings('menu item', 'menu items');

        $this->crud->allowAccess('reorder');
        $this->crud->enableReorder('name', 2);

        $this->crud->addColumn([
            'name' => 'name',
            'label' => 'Name',
        ]);

        $this->crud->addField([
            'name' => 'name',
            'label' => 'Name',
        ]);
        $this->crud->addField([
            'label' => 'Parent',
            'type' => 'select',
            'name' => 'parent_id',
            'entity' => 'parent',
            'attribute' => 'name',
            'model' => "\Modules\Menu\Models\MenuItem",
        ]);
        $this->crud->addField([
            'name' => 'type',
            'label' => 'Type',
            'type' => 'page_or_link',
            'page_model' => '\Modules\Page\Models\Page',
        ]);

        $this->crud->addField([
            'label' => 'Menü',
            'type' => 'select',
            'name' => 'menu_id',
            'entity' => 'menu',
            'attribute' => 'name',
            'model' => "\Modules\Menu\Models\Menu",
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
