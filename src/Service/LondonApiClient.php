<?php

namespace App\Service;

use App\Model\Humidity;
use App\Model\Temperature;
use App\Model\Weather;

class LondonApiClient implements MeasurementApiClientInterface
{

    function getCityName(): string
    {
        return 'london';
    }

    function getPage(): string
    {
        return 'london.json';
    }

    function getMeasurements(array $json): Weather
    {
        return new Weather(
            new Humidity($json['humidity']),
            new Temperature($json['temperature']),
            null
        );
    }
}
