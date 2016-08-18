<?php

use Modules\Car\Models\Car;
use Modules\Car\Models\CarModel;
use Modules\Car\Models\Category;
use Modules\Car\Models\Company;
use Modules\MobileApi\Http\Requests;

/**
 * Created by PhpStorm.
 * User: Enes
 * Date: 13.08.16
 * Time: 20:03
 */
class CarTest extends TestCase
{

    /** @test */
    function carInsertion()
    {
            $item = Requests\ApiRequest::getAd(228532154);
            $this->assertEquals(228532154, $item->{'@key'});
            Company::findOrCreateByAPI($item);
    }

    /** @test */
    public function totalCars()
    {
        $ads = Requests\ApiRequest::getAds();
        $this->assertEquals(20, count($ads));
    }
} 