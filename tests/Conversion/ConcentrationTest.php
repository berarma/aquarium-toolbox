<?php
namespace Berarma\AquariumToolbox\Tests;

use Berarma\AquariumToolbox\Conversion\Concentration;

class ConcentrationTest extends \PHPUnit\Framework\TestCase
{

    public function testCreation()
    {
        $concentration = new Concentration(12);
        $this->assertEquals(12, $concentration->toUnit());
    }

    public function testConversions()
    {
        $concentration = new Concentration(1, 'g/l');
        $this->assertEquals(1e3, $concentration->toUnit('mg/l'));
        $this->assertEquals(1e-3, $concentration->toUnit('g/ml'));
        $this->assertEquals(1e3, $concentration->toUnit('ppm'));
        $concentration = new Concentration(1, 'mg/l');
        $this->assertEquals(1e-3, $concentration->toUnit('g/l'));
        $this->assertEquals(1e-6, $concentration->toUnit('g/ml'));
        $this->assertEquals(1, $concentration->toUnit('ppm'));
        $concentration = new Concentration(1, 'ppm');
        $this->assertEquals(1, $concentration->toUnit('mg/l'));
        $this->assertEquals(1e-6, $concentration->toUnit('g/ml'));
        $this->assertEquals(1e-3, $concentration->toUnit('g/l'));
    }

    public function testToString()
    {
        $concentration = new Concentration(3e-6);
        $this->assertEquals('3ppm', $concentration->__toString());
    }
}
