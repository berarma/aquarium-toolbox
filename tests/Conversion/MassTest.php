<?php
namespace AquaTx\Test;

use AquaTx\Conversion\Mass;

class MassTest extends \PHPUnit\Framework\TestCase
{

    public function testCreation()
    {
        $mass = new Mass(12);
        $this->assertEquals(12, $mass->toUnit());
    }

    public function testConversions()
    {
        $mass = new Mass(1, 'kg');
        $this->assertEquals(1, $mass->toUnit('kg'));
        $this->assertEquals(1e3, $mass->toUnit('g'));
        $this->assertEquals(1e6, $mass->toUnit('mg'));
        $this->assertEquals(1e9, $mass->toUnit('ug'), '', 0.0001);
        $mass = new Mass(1, 'g');
        $this->assertEquals(1e-3, $mass->toUnit('kg'));
        $this->assertEquals(1, $mass->toUnit('g'));
        $this->assertEquals(1e3, $mass->toUnit('mg'));
        $this->assertEquals(1e6, $mass->toUnit('ug'));
        $mass = new Mass(1, 'mg');
        $this->assertEquals(1e-6, $mass->toUnit('kg'));
        $this->assertEquals(1e-3, $mass->toUnit('g'));
        $this->assertEquals(1, $mass->toUnit('mg'));
        $this->assertEquals(1e3, $mass->toUnit('ug'));
        $mass = new Mass(1, 'ug');
        $this->assertEquals(1e-9, $mass->toUnit('kg'), '', 0.0001);
        $this->assertEquals(1e-6, $mass->toUnit('g'));
        $this->assertEquals(1e-3, $mass->toUnit('mg'));
        $this->assertEquals(1, $mass->toUnit('ug'));
    }

    public function testToString()
    {
        $mass = new Mass(3);
        $this->assertEquals('3kg', $mass->__toString());
    }
}
