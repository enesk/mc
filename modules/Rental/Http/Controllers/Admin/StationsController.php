<?php

namespace Modules\Rental\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use Modules\Rental\Http\Requests\StationRequest as StoreRequest;
use Modules\Rental\Http\Requests\StationRequest as UpdateRequest;

class StationsController extends CrudController
{

    public function __construct()
    {
        parent::__construct();

        $this->crud->setModel("Modules\Rental\Models\Station");
        $this->crud->setRoute("admin/rental/stations");
        $this->crud->setEntityNameStrings('station', 'stations');

        $this->crud->setColumns(['name', 'city']);
        $this->crud->addField([
            'name' => 'name',
            'label' => "Stationname"
        ]);

        $this->crud->addField([
            'name' => 'street',
            'label' => "Strasse"
        ]);

        $this->crud->addField([
            'name' => 'houseno',
            'label' => "Nr."
        ]);

        $this->crud->addField([
            'name' => 'zipcode',
            'label' => "Postleitzahl"
        ]);

        $this->crud->addField([
            'name' => 'city',
            'label' => "Stadt"
        ]);

        $this->crud->addField([
            'name' => 'tel',
            'label' => "Telefon"
        ]);

        $this->crud->addField([
            'name' => 'order',
            'label' => "Reihenfolge"
        ]);

        $this->crud->addField([
            'name' => 'openings',
            'label' => "Öffnungszeiten",
            'type' => 'openings',
            'openings' => $this->getOpenings()
        ]);


    }

    public function getOpenings()
    {
        $data = [
            'mo' => [
                'name' => 'Montag',
            ],
            'di' => [
                'name' => 'Dienstag',
            ],
            'mi' => [
                'name' => 'Mittwoch',
            ],
            'do' => [
                'name' => 'Donnerstag',
            ],
            'fr' => [
                'name' => 'Freitag',
            ],
            'sa' => [
                'name' => 'Samstag',
            ],
        ];

        return $data;
    }

    public function store(StoreRequest $request)
    {
        $this->setOpenings($request);
        return parent::storeCrud($request);
    }

    public function update(UpdateRequest $request)
    {
        $this->setOpenings($request);
        return parent::updateCrud($request);
    }

    /**
     * @param UpdateRequest $request
     */
    public function setOpenings(StoreRequest $request)
    {
        $openings = $request->get('openings')['opening'];
        $closings = $request->get('openings')['closing'];
        $data = [
            'openings' => $openings,
            'closings' => $closings,
        ];

        $encoded = json_encode($data);
        $request->merge(['openings' => $encoded]);

    }
}
