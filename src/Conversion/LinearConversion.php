<?php
namespace AquaTx\Conversion;

class LinearConversion
{

    protected $table;

    protected $automatic;

    protected $default;

    public function __construct($default, $table, $automatic)
    {
        $this->table = $table;
        $this->automatic = $automatic;
        $this->default = $default;
    }

    public function fromUnit($value, $unit)
    {
        if ($unit === null) {
            $unit = $this->default;
        }
        return $value * $this->table[$unit];
    }

    public function toUnit($value, $unit)
    {
        if ($unit === null) {
            $unit = $this->default;
        }
        return $value / $this->table[$unit];
    }

    public function toString($value)
    {
        foreach ($this->automatic as $unit => $interval) {
            list($min, $max) = $interval;
            if (($min === null || $value >= $min) && ($max === null || $value < $max)) {
                return $this->toUnit($value, $unit) . $unit;
            }
        }
    }
}
