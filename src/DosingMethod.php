<?php
namespace Berarma\AquariumToolbox;

use Berarma\AquariumToolbox\Conversion\Concentration;

class DosingMethod
{

    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function element($element)
    {
        if (!array_key_exists($element, $this->data)) {
            return new Concentration(0);
        }
        return new Concentration($this->data[$element]['method'], 'ppm');
    }
}
