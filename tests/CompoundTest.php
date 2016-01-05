<?php

use Berarma\AquariumToolbox\Compound;
use Berarma\AquariumToolbox\Conversion\Mass;
use Berarma\AquariumToolbox\Conversion\Volume;

class CompoundTest extends PHPUnit_Framework_TestCase
{

    protected $compound;

    public function setUp()
    {
        $this->compound = new Compound([
            'tsp' => 5200,
            'sol' => 360,
            'target' => 'NO3',
            'elements' => [
                'NO3' => 0.6133,
                'N' => 0.138539,
                'K' => 0.3867,
            ],
        ], new Mass(1, 'g'));
    }

    public function testListElements()
    {
        $this->assertContains('NO3', $this->compound->listElements());
    }

    public function testElement()
    {
        $this->assertInstanceOf('\Berarma\AquariumToolbox\Conversion\Mass', $this->compound->element());
        $this->assertEquals(0.6133, $this->compound->element()->toUnit('g'), null, 0.0001);
        $this->assertEquals(0.138539, $this->compound->element('N')->toUnit('g'), null, 0.000001);
    }

    public function testGetSolubility()
    {
        $this->assertInstanceOf('\Berarma\AquariumToolbox\Conversion\Concentration', $this->compound->getSolubility());
        $this->assertEquals(360, $this->compound->getSolubility()->toUnit('mg/ml'));
    }

    public function testGetVolume()
    {
        $this->assertInstanceOf('\Berarma\AquariumToolbox\Conversion\Volume', $this->compound->getVolume());
        $this->assertEquals(0.9615, $this->compound->getVolume()->toUnit('ml'), null, 0.0001);
    }
}

