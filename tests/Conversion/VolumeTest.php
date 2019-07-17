<?php
namespace AquaTx\Test;

use AquaTx\Conversion\Volume;

class VolumeTest extends \PHPUnit\Framework\TestCase
{

    public function testCreation()
    {
        $volume = new Volume(12);
        $this->assertEquals(12, $volume->toUnit());
    }

    public function testConversions()
    {
        $volume = new Volume(1, 'l');
        $this->assertEquals(1, $volume->toUnit('l'));
        $this->assertEquals(1e1, $volume->toUnit('dl'));
        $this->assertEquals(1e2, $volume->toUnit('cl'));
        $this->assertEqualsWithDelta(1e3, $volume->toUnit('ml'), 0.0001);
        $volume = new Volume(1, 'dl');
        $this->assertEquals(1e-1, $volume->toUnit('l'));
        $this->assertEquals(1, $volume->toUnit('dl'));
        $this->assertEquals(1e1, $volume->toUnit('cl'));
        $this->assertEquals(1e2, $volume->toUnit('ml'));
        $volume = new Volume(1, 'cl');
        $this->assertEquals(1e-2, $volume->toUnit('l'));
        $this->assertEquals(1e-1, $volume->toUnit('dl'));
        $this->assertEquals(1, $volume->toUnit('cl'));
        $this->assertEquals(1e1, $volume->toUnit('ml'));
        $volume = new Volume(1, 'ml');
        $this->assertEqualsWithDelta(1e-3, $volume->toUnit('l'), 0.0001);
        $this->assertEquals(1e-2, $volume->toUnit('dl'));
        $this->assertEquals(1e-1, $volume->toUnit('cl'));
        $this->assertEquals(1, $volume->toUnit('ml'));
    }

    public function testToString()
    {
        $volume = new Volume(3);
        $this->assertEquals('3l', $volume->__toString());
    }
}
