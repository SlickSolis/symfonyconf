<?php

namespace App\Service;

use App\Model\Humidity;
use App\Model\Temperature;
use App\Model\Weather;
use App\Model\Wind;

class ParisApiClient implements MeasurementApiClientInterface
{

    function getCityName(): string
    {
        return 'paris';
    }

    function getPage(): string
    {
        return 'paris.json';
    }

    function getMeasurements(array $json): Weather
    {
        return new Weather(
            new Humidity($json['humidity']),
            new Temperature($json['temperature']),
            new Wind($json['wind'])
        );
    }
}
