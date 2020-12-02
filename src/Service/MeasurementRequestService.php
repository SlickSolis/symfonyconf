<?php

namespace App\Service;

use App\Model\Weather;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class MeasurementRequestService
{
    private $client;
    private $host;
    /** @var MeasurementApiClientInterface[] $apiClients */
    private $apiClients = [];

    public function __construct(HttpClientInterface $client, string $host)
    {
        $this->client = $client;
        $this->host = $host;
    }

    public function getWeather(string $page): ?Weather
    {
        $this->registerClients();

        foreach ($this->apiClients as $apiClient)
        {
            if ($page === $apiClient->getCityName())
            {
                return $apiClient->getMeasurements($this->requestMeasurements($apiClient->getPage()));
            }
        }

        return null;
    }

    private function requestMeasurements(string $page): array
    {
        $response = $this->client->request('GET', "{$this->host}/{$page}");

        return $response->toArray();
    }

    private function registerClient(MeasurementApiClientInterface $client): self
    {
        $this->apiClients[] = $client;

        return $this;
    }

    private function registerClients(): void
    {
        $this->registerClient(new BerlinApiClient());
        $this->registerClient(new LondonApiClient());
        $this->registerClient(new ParisApiClient());
    }
}
