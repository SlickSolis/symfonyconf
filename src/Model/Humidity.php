<?php

namespace App\Model;

class Humidity
{
    private $value;

    public function __construct(float $value)
    {
        if ($value < 0 || $value > 100)
        {
            throw new \InvalidArgumentException('...');
        }

        $this->value = $value;
    }

    public function getValue(): float
    {
        return $this->value;
    }

    public function equals(self $other): bool
    {
        return $other->value === $this->value;
    }
}
