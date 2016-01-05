<?php
namespace Berarma\AquariumToolbox\Conversion;

class Concentration
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
        } elseif ($unit === 'ppm') {
            $units = ['mg', 'l'];
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
        return ($this->mass->toUnit('mg') / $this->volume->toUnit('l')) . 'ppm';
    }
}
