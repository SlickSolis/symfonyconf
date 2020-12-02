<?php

namespace App\Service;

use App\Model\Weather;
use Symfony\Contracts\HttpClient\HttpClientInterface;

interface MeasurementApiClientInterface
{
    function getCityName(): string;
    function getPage(): string;
    function getMeasurements(array $json): Weather;
}
