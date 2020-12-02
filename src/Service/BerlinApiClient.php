<?php

namespace App\Service;

use App\Model\Humidity;
use App\Model\Temperature;
use App\Model\Weather;
use App\Model\Wind;

class BerlinApiClient implements MeasurementApiClientInterface
{
    function getCityName(): string
    {
        return 'berlin';
    }

    function getPage(): string
    {
        return 'berlin.json';
    }

    function getMeasurements(array $json): Weather
    {
        return new Weather(
            new Humidity($json['measure']['humidity']),
            new Temperature($json['measure']['temp']),
            new Wind($json['measure']['wind'])
        );
    }
}
