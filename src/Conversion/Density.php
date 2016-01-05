<?php
namespace Berarma\AquariumToolbox\Conversion;

class Density
{

    protected $mass;

    protected $volume;

    public function __construct($value, $unit = null)
    {
        list($massUnit, $volumeUnit) = $this->splitUnits($unit);
        $this->mass = new Mass($value, $massUnit);
        $this->volume = new Volume(1, $volumeUnit);
    }

    protected function splitUnits($unit)
    {
        if ($unit === null) {
            $units = [null, null];
        } else {
            $units = explode('/', $unit);
        }
        return $units;
    }

    public function toUnit($unit = null)
    {
        list($massUnit, $volumeUnit) = $this->splitUnits($unit);
        return $this->mass->toUnit($massUnit) / $this->volume->toUnit($volumeUnit);
    }

    public function __toString()
    {
        return ($this->mass->toUnit('g') / $this->volume->toUnit('ml')) . 'g/ml';
    }
}
