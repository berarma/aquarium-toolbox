<?php

use Berarma\AquariumToolbox\Solution;
use Berarma\AquariumToolbox\Compound;
use Berarma\AquariumToolbox\Conversion\Mass;
use Berarma\AquariumToolbox\Conversion\Volume;

class SolutionTest extends PHPUnit_Framework_TestCase
{

    protected $solution;

    public function setUp()
    {
        $this->solution = new Solution(
            new Compound([
                'tsp' => 5200,
                'sol' => 360,
                'target' => 'NO3',
                'elements' => [
                    'NO3' => 0.6133,
                    'N' => 0.138539,
                    'K' => 0.3867,
                ],
            ], new Mass(1, 'g')),
            new Volume(1, 'l')
        );
    }

    public function testListElements()
    {
        $this->assertContains('K', $this->solution->listElements());
    }

    public function testElement()
    {
        $this->assertInstanceOf('\Berarma\AquariumToolbox\Conversion\Mass', $this->solution->element());
        $this->assertEquals(613.3, $this->solution->element()->toUnit('mg'), null, 0.001);
        $this->assertEquals(138.539, $this->solution->element('N')->toUnit('mg'), null, 0.001);
    }

    public function testConcentration()
    {
        $this->assertInstanceOf('\Berarma\AquariumToolbox\Conversion\Concentration', $this->solution->concentration());
        $this->assertEquals(1000, $this->solution->concentration()->toUnit('ppm'));
    }

    public function testGh()
    {
        $solution = new Solution(
            new Compound([
                'tsp' => 5333,
                'target' => 'K',
                'elements' => [
                    'K' => 0.195,
                    'Ca' => 0.0806,
                    'Mg' => 0.0241,
                    'Fe' => 0.0011,
                    'Mn' => 0.0006,
                ],
            ], new Mass(16, 'g')),
            new Volume(80, 'l')
        );
        $this->assertEquals(3.3676, $solution->gh(), null, 1e-4);
    }

    public function testKh()
    {
        $solution = new Solution(
            new Compound([
                'target' => 'HCO3',
                'elements' => [
                    'HCO3' => 0.726334272,
                    'Na' => 0.273665728,
                ],
            ], new Mass(120, 'mg')),
            new Volume(1, 'l')
        );
        $this->assertEquals(4.0052, $solution->kh(), null, 1e-4);
    }
}

