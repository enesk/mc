<?php

namespace Modules\MobileApi\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Car\Models\Car;
use Modules\Car\Models\CarModel;
use Modules\Car\Models\Photo;
use Modules\Car\Models\Category;
use Modules\Car\Models\Company;
use Modules\Car\Models\Feature;
use Modules\Car\Models\Specifics\FuelConsumption;
use Modules\Car\Models\Specifics\Specific;
use Modules\MobileApi\Http\Requests\ApiRequest;
use Carbon\Carbon;

class MobileApiController extends Controller
{

    public function index()
    {
        ini_set('memory_limit', '-1');
        $ads = $this->getAds();
        $this->createCars($ads);
        #$deleted = $this->deleteCars($ads);

        #echo count($created).' cars created and '.count($deleted).' cars deleted.';
    }

    /**
     * @return array
     */
    public function getAds()
    {
        $pageSize = 100;
        $callDetails = 'page.size=' . $pageSize;
        $all = ApiRequest::getAll($callDetails);
        $maxPages = ApiRequest::getMaxPages($all);
        $totalAds = [];
        for ($i = 1; $i <= $maxPages; $i++):
            $callDetails = 'page.size=100&page.number=' . $i;
            $api = ApiRequest::getAll($callDetails);
            $totalAds[] = ApiRequest::getAds($api);
        endfor;
        $allAds = [];
        foreach ($totalAds as $ads):
            foreach ($ads as $ad):
                $allAds[] = $ad;
            endforeach;
        endforeach;

        return $allAds;
    }

    /**
     * @param $adID
     * @return MobileApiController
     */
    public function saveCar($adID)
    {
        $ad = ApiRequest::getAd($adID);
        $category = Category::findOrCreateByAPI($ad);
        $company = Company::findOrCreateByAPI($ad);
        $model = CarModel::findOrCreateByAPI($ad, $company->id);
        $car = $this->createCar($ad, $category, $company, $model);
        $this->createFeatures($ad, $car);
        $this->createSpecifics($ad, $car);
        $this->createImages($ad, $car);

        return $car;
    }

    /**
     * @param $ad
     * @param $car
     */
    public function createFeatures($ad, $car)
    {
        $features = Feature::findOrCreateByAPI($ad);
        $car->features()->attach($features);
    }

    /**
     * @param $ad
     * @param $category
     * @param $company
     * @param $model
     * @return static
     */
    public function createCar($ad, $category, $company, $model)
    {
        $power = $this->getPower($ad);
        $carData = [
            'title' => $ad->vehicle->{'model-description'}->{'@value'},
            'description' => $ad->description,
            'first_registration' => Carbon::createFromFormat('Y-m', $ad->vehicle->specifics->{'first-registration'}->{'@value'})->toDateTimeString(),
            'price' => $ad->price->{'consumer-price-amount'}->{'@value'},
            'mileage' => $this->getMileage($ad),
            'power' => $power,
            'vatable' => ApiRequest::check($ad->vehicle->{'damage-and-unrepaired'}->{'@value'}),
            'damage_and_unrepaired' => ApiRequest::check($ad->price->vatable->{'@value'}),
            'category_id' => $category->id,
            'company_id' => $company->id,
            'model_id' => $model->id,
            'mobile_id' => $ad->{'@key'}
        ];
        $car = Car::create($carData);
        return $car;
    }

    /**
     * @param $specific
     * @param $car
     * @return static
     */
    public function createFuelConsumption($specific, $car)
    {
        if (!isset($specific->{'@co2-emission'}))
            $specific->{'@co2-emission'} = 0;

        if (!isset($specific->{'@inner'}))
            $specific->{'@inner'} = 0;

        if (!isset($specific->{'@outer'}))
            $specific->{'@outer'} = 0;

        if (!isset($specific->{'@combined'}))
            $specific->{'@combined'} = 0;

        if (!isset($specific->{'@unit'}))
            $specific->{'@unit'} = 0;

        $fuelConsumptionData = [
            'envkv_compliant' => ApiRequest::check($specific->{'@envkv-compliant'}),
            'co2_emission' => $specific->{'@co2-emission'},
            'inner' => $specific->{'@inner'},
            'outer' => $specific->{'@outer'},
            'combined' => $specific->{'@combined'},
            'unit' => $specific->{'@unit'},
            'car_id' => $car->id
        ];
        $fuelConsumption = FuelConsumption::create($fuelConsumptionData);

        return $fuelConsumption;
    }

    /**
     * @param $ad
     * @return int
     */
    public function getMileage($ad)
    {
        $mileage = 0;
        if (isset($ad->vehicle->specifics->mileage->{'@value'})):
            $mileage = $ad->vehicle->specifics->mileage->{'@value'};
        endif;

        return $mileage;
    }


    /**
     * @param $ad
     * @param $car
     */
    public function createSpecifics($ad, $car)
    {
        foreach ($ad->vehicle->specifics as $key => $specific):

            if ($key == 'emission-fuel-consumption'):
                $this->createFuelConsumption($specific, $car);
            endif;
            if (!isset($specific->{'@key'}))
                continue;

            $specificData = [
                'name' => $key,
                'key' => $specific->{'@key'},
                'value' => $specific->{'local-description'}->{'$'},
                'car_id' => $car->id
            ];
            Specific::create($specificData);
        endforeach;
    }

    /**
     * @param $ad
     * @param $car
     */
    public function createImages($ad, $car)
    {
        if (!is_dir(public_path('uploads/cars/' . $car->id)))
            mkdir("uploads/cars/$car->id");

        foreach ($ad->images->image as $image):
            if (isset($image->representation)):
                $link = $image->representation[1]->{'@url'};
            else:
                $link = $image[1]->{'@url'};
            endif;
            $extension = pathinfo($link, PATHINFO_EXTENSION);
            $path = '/uploads/cars/' . $car->id . '/' . uniqid() . '.' . $extension;
            $copyPath = public_path($path);
            $copy = \File::copy($link, $copyPath);
            if ($copy):
                $photoData = [
                    'path' => $path,
                    'car_id' => $car->id
                ];
                Photo::create($photoData);
            endif;
        endforeach;
    }

    /**
     * @param $ads
     * @return array
     */
    public function deleteCars($ads)
    {

        $cars = Car::orderBy('mobile_id', 'desc')->get();

        $deleted = [];
        foreach ($cars as $car):
            $check = array_search($car->mobile_id, array_column($ads, '@key'));
            if (!$check):
                $deleted[] = $car->mobile_id;
                Car::destroy($car->id);
                \File::deleteDirectory(public_path('uploads/cars/' . $car->id));
            endif;
        endforeach;

        return $deleted;

    }

    /**
     * @param $ads
     * @return array
     */
    public function createCars($ads)
    {
        $cars = [];
        foreach ($ads as $ad):
            $adID = $ad->{'@key'};
            $checkCar = Car::where('mobile_id', $adID)->get();
            if (!$checkCar->isEmpty())
                continue;
            $cars[] = $this->saveCar($adID);
        endforeach;

        return $cars;
    }

    /**
     * @param $ad
     * @return int
     */
    public function getPower($ad)
    {
        if (!isset($ad->vehicle->specifics->power->{'@value'})):
            $power = 0;
        else:
            $power = $ad->vehicle->specifics->power->{'@value'};
        endif;

        return $power;
    }

    /**
     * @param $id
     * @param $array
     * @return bool
     */
    public function searchForIDInAPI($id, $array)
    {
        foreach ($array as $a):
            $adID = $a->{'@key'};

            if ($adID == $id)
                return $id;

        endforeach;

        return false;
    }
}
