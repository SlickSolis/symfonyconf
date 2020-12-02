<?php

namespace App\Controller;

use App\Service\MeasurementRequestService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class WeatherController extends AbstractController
{
    /**
     * @Route("/{city}")
     */
    public function getWeather(MeasurementRequestService $service, string $city)
    {
        $weather = $service->getWeather($city);
        $response = null !== $weather ? $weather->jsonSerialize() : [];

        return new JsonResponse($response);
    }
}
