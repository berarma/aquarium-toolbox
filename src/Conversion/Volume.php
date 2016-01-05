<?php
namespace Berarma\AquariumToolbox\Conversion;

class Volume
{

    protected $conversion;

    protected $value;

    public function __construct($value, $unit = null)
    {
        $this->conversion = new LinearConversion('l', [
            'l' => 1,
            'dl' => 1e-1,
            'cl' => 1e-2,
            'ml' => 1e-3,
            'ul' => 1e-6,
            'us_gallon' => 3.78541,
            'uk_gallon' => 4.54609,
            'teaspoon' => 5e-3,
            'us_teaspoon' => 4.92892159375e-3,
            'tablespoon' => 1.5e-2,
            'us_tablespoon' => 1.478676478125e-2,
            'cup' => 2.5e-1,
            'us_cup' => 2.3659e-1,
            'uk_cup' => 2.841e-1,
        ],
        [
            'l' => [0.1, null],
            'ml' => [null, 0.1],
        ]);
        $this->value = $this->conversion->fromUnit($value, $unit);
    }

    public function toUnit($unit = null)
    {
        return $this->conversion->toUnit($this->value, $unit);
    }

    public function __toString()
    {
        return $this->conversion->toString($this->value);
    }
}
