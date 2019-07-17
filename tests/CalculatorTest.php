<?php
namespace AquaTx\Test;

use AquaTx\Calculator;
use AquaTx\Compound;
use AquaTx\Solution;
use AquaTx\DosingMethod;
use AquaTx\Conversion\Volume;
use AquaTx\Conversion\Mass;
use AquaTx\Conversion\Concentration;

class CalculatorTest extends \PHPUnit\Framework\TestCase
{
    protected $assistant;

    protected $compound;

    protected $solution;

    public function setUp(): void
    {
        $this->assistant = new Calculator(new Volume(100, 'l'));
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
        $this->assertEqualsWithDelta(
            1.6305,
            $this->assistant->targetElement(new Concentration(10, 'ppm'), $this->compound),
            0.0001
        );
        $this->assertEqualsWithDelta(
            2.5860,
            $this->assistant->targetElement(new Concentration(10, 'ppm'), $this->compound, 'K'),
            0.0001
        );
        $this->assertEqualsWithDelta(
            1.6575,
            $this->assistant->targetElement(new Concentration(10, 'ppm'), $this->solution),
            0.0001
        );
        $this->assertEqualsWithDelta(
            2.6546,
            $this->assistant->targetElement(new Concentration(10, 'ppm'), $this->solution, 'K'),
            0.0001
        );
    }

    public function testTargetDosingMethod()
    {
        $this->assertEqualsWithDelta(
            1.2229,
            $this->assistant->targetDosingMethod($this->dosingMethod, $this->compound, 'NO3'),
            0.0001
        );
        $this->assertEqualsWithDelta(
            1.2380,
            $this->assistant->targetDosingMethod($this->dosingMethod, $this->solution, 'NO3'),
            0.0001
        );
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
        $this->assertEqualsWithDelta(1.4851, $this->assistant->targetGh(4, $compound), 0.0001);
        $solution = new Solution($compound, new Volume(1, 'l'));
        $this->assertEqualsWithDelta(1.5071, $this->assistant->targetGh(4, $solution), 0.0001);
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
        $this->assertEqualsWithDelta(99.8752, $this->assistant->targetKh(4, $compound), 0.0001);
    }
}
