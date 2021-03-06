<?php

namespace App\Model;

class Temperature
{
    private $value;

    public function __construct(float $value)
    {
        if ($value < -273.15)
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
