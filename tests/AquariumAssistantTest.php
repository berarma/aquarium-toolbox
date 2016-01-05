<?php

use Berarma\AquariumToolbox\AquariumAssistant;
use Berarma\AquariumToolbox\Compound;
use Berarma\AquariumToolbox\Solution;
use Berarma\AquariumToolbox\DosingMethod;
use Berarma\AquariumToolbox\Conversion\Volume;
use Berarma\AquariumToolbox\Conversion\Mass;
use Berarma\AquariumToolbox\Conversion\Concentration;

class AquariumAssistantTest extends PHPUnit_Framework_TestCase
{

    protected $assistant;

    protected $compound;

    protected $solution;

    public function setUp()
    {
        $this->assistant = new AquariumAssistant(new Volume(100, 'l'));
        $this->assistant->setVolume(new Volume(100, 'l'));
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
        $this->solution = new Solution($this->compound, new Volume(1, 'l'));
        $this->dosingMethod = new DosingMethod([
            'NO3' => [
                'method' => 7.5,
                'low' => 5,
                'high' => 30,
                'margin' => 25,
            ],
        ]);
    }

    public function testTargetElement()
    {
        $this->assertEquals(1.6305, $this->assistant->targetElement(new Concentration(10, 'ppm'), $this->compound), null, 0.0001);
        $this->assertEquals(2.5860, $this->assistant->targetElement(new Concentration(10, 'ppm'), $this->compound, 'K'), null, 0.0001);
        $this->assertEquals(1.6575, $this->assistant->targetElement(new Concentration(10, 'ppm'), $this->solution), null, 0.0001);
        $this->assertEquals(2.6546, $this->assistant->targetElement(new Concentration(10, 'ppm'), $this->solution, 'K'), null, 0.0001);
    }

    public function testTargetDosingMethod()
    {
        $this->assertEquals(1.2229, $this->assistant->targetDosingMethod($this->dosingMethod, $this->compound, 'NO3'), null, 0.0001);
        $this->assertEquals(1.2380, $this->assistant->targetDosingMethod($this->dosingMethod, $this->solution, 'NO3'), null, 0.0001);
    }

    public function testTargetGh()
    {
        $compound = new Compound([
            'tsp' => 5333,
            'target' => 'K',
            'elements' => [
                'K' => 0.195,
                'Ca' => 0.0806,
                'Mg' => 0.0241,
                'Fe' => 0.0011,
                'Mn' => 0.0006,
            ],
        ], new Mass(16, 'g'));
        $this->assertEquals(1.4851, $this->assistant->targetGh(4, $compound), null, 0.0001);
        $solution = new Solution($compound, new Volume(1, 'l'));
        $this->assertEquals(1.5071, $this->assistant->targetGh(4, $solution), null, 0.0001);
    }

    public function testTargetKh()
    {
        $compound = new Compound([
            'tsp' => 11000,
            'target' => 'HCO3',
            'elements' => [
                'HCO3' => 0.726334272,
                'Na' => 0.273665728,
            ],
        ], new Mass(120, 'mg'));
        $this->assertEquals(99.8752, $this->assistant->targetKh(4, $compound), null, 0.0001);
    }
}

