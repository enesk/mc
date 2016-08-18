<?php

namespace Modules\MobileApi\Http\Requests;

class ApiRequest
{
    /**
     * @param $function
     * @param $method
     * @param $url
     * @param array $details
     * @return array
     */
    public static function call($function, $method, $url, $details = array())
    {
        $curl = new \anlutro\cURL\cURL();
        $request = $curl->$function($method, $url, $details)
            ->setUser('dlr_millennium')->setPass('Fzbn7bb9zM36')
            ->setHeader('Accept', 'application/json')
            ->setHeader('Accept-Language', 'de');
        $response = $request->send();
        $data = (array)json_decode($response);

        return $data;
    }

    /**
     * @param string $details
     * @return array
     */
    public static function getAll($details = '')
    {
        $call = self::call('newJsonRequest', 'get', 'https://services.mobile.de/search-api/search?' . $details);

        return $call;
    }

    /**
     * @param $api
     * @return mixed
     */
    public static function getAds($api)
    {
        $data = $api['search-result']->ads->ad;

        return $data;
    }

    /**
     * @param $adID
     * @return array
     */
    public static function getAd($adID)
    {
        return self::call('newJsonRequest', 'get', 'https://services.mobile.de/search-api/ad/' . $adID)['ad'];
    }

    /**
     * @param $apiCall
     * @return mixed
     */
    public static function getMaxPages($apiCall)
    {
        return $apiCall['search-result']->{'max-pages'};
    }

    /**
     * @return mixed
     */
    public static function getCurrentPage()
    {
        return self::getAll()['search-result']->{'current-page'};
    }

    /**
     * @param $check
     * @return bool
     */
    public static function check($check)
    {
        if ($check)
            return true;

        return false;
    }
}