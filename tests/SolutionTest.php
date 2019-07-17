<?php
namespace AquaTx\Test;

use AquaTx\Solution;
use AquaTx\Compound;
use AquaTx\Conversion\Mass;
use AquaTx\Conversion\Volume;

class SolutionTest extends \PHPUnit\Framework\TestCase
{

    protected $solution;

    public function setUp(): void
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
        $this->assertInstanceOf('\AquaTx\Conversion\Mass', $this->solution->element());
        $this->assertEqualsWithDelta(613.3, $this->solution->element()->toUnit('mg'), 0.001);
        $this->assertEqualsWithDelta(138.539, $this->solution->element('N')->toUnit('mg'), 0.001);
    }

    public function testConcentration()
    {
        $this->assertInstanceOf('\AquaTx\Conversion\Concentration', $this->solution->concentration());
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
        $this->assertEqualsWithDelta(3.3676, $solution->gh(), 1e-4);
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
        $this->assertEqualsWithDelta(4.0052, $solution->kh(), 1e-4);
    }
}
