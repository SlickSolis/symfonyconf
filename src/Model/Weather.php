<?php

namespace App\Model;

class Weather implements \JsonSerializable
{
    private $humidity;
    private $temperature;
    private $wind;

    public function __construct(Humidity $humidity, Temperature $temperature, ?Wind $wind)
    {
        $this->humidity = $humidity;
        $this->temperature = $temperature;
        $this->wind = $wind;
    }

    /**
     * @return Humidity
     */
    public function getHumidity(): Humidity
    {
        return $this->humidity;
    }

    /**
     * @return Temperature
     */
    public function getTemperature(): Temperature
    {
        return $this->temperature;
    }

    /**
     * @return Wind|null
     */
    public function getWind(): ?Wind
    {
        return $this->wind;
    }

    public function equals(self $other): bool
    {
        return $this->humidity->equals($other->humidity)
            && $this->temperature->equals($other->temperature)
            && (null !== $this->wind && null !== $other->wind && $this->wind->equals($other->wind));
    }

    public function jsonSerialize()
    {
        return [
            'humidity' => $this->humidity->getValue(),
            'temperature' => $this->temperature->getValue(),
            'wind' => null !== $this->wind ? $this->wind->getValue() : null,
        ];
    }
}
