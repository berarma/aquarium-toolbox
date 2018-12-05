<?php
namespace Berarma\AquariumToolbox\Conversion;

class Mass
{

    protected $conversion;

    protected $value;

    public function __construct($value, $unit = null)
    {
        $this->conversion = new LinearConversion(
            'kg',
            [
            'kg' => 1,
            'g' => 1e-3,
            'mg' => 1e-6,
            'ug' => 1e-9,
            'pump' => 1.2e-5,
            'cap' => 5e-5,
            ],
            [
            'kg' => [1, null],
            'g' => [1e-3, null],
            'mg' => [1e-6, 1e-3],
            'ug' => [null, 1e-6],
            ]
        );
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
