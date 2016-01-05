<?php

use Berarma\AquariumToolbox\AquariumToolbox;
use Berarma\AquariumToolbox\Conversion\Mass;
use Berarma\AquariumToolbox\Conversion\Volume;
use Berarma\AquariumToolbox\Conversion\Concentration;

class AquariumToolboxTest extends PHPUnit_Framework_TestCase
{

    protected $toolbox;

    public function setUp()
    {
        $this->toolbox = new AquariumToolbox();
    }

    public function testListDryCompounds()
    {
        $this->assertContains('KNO3', $this->toolbox->listDryCompounds());
    }

    public function testListWetCompounds()
    {
        $this->assertContains('Easy Life ProFito', $this->toolbox->listWetCompounds());
    }

    public function testListDosingMethods()
    {
        $this->assertContains('EI', $this->toolbox->listDosingMethods());
    }

    public function testGetDryCompound()
    {
        $compound = $this->toolbox->getDryCompound('KNO3');
        $this->assertInstanceOf('Berarma\AquariumToolbox\Compound', $compound);
        $this->assertEquals(1, $compound->getMass()->toUnit());
        $compound = $this->toolbox->getDryCompound('KNO3', new Mass(1, 'g'));
        $this->assertInstanceOf('Berarma\AquariumToolbox\Compound', $compound);
        $this->assertEquals(1e-3, $compound->getMass()->toUnit());
    }

    public function testGetDryCompoundNotExists()
    {
        $this->assertNull($this->toolbox->getDryCompound('MadeUpName'));
    }

    public function testGetWetCompound()
    {
        $compound = $this->toolbox->getWetCompound('Easy Life ProFito');
        $this->assertInstanceOf('Berarma\AquariumToolbox\Solution', $compound);
        $this->assertEquals(1, $compound->getVolume()->toUnit());
        $compound = $this->toolbox->getWetCompound('Easy Life ProFito', new Volume(1, 'ml'));
        $this->assertInstanceOf('Berarma\AquariumToolbox\Solution', $compound);
        $this->assertEquals(1e-3, $compound->getVolume()->toUnit());
    }

    public function testGetWetCompoundNotExists()
    {
        $this->assertNull($this->toolbox->getWetCompound('MadeUpName'));
    }

    public function testGetDosingMethod()
    {
        $this->assertInstanceOf('Berarma\AquariumToolbox\DosingMethod', $this->toolbox->getDosingMethod('EI'));
    }

    public function testGetDosingMethodNotExists()
    {
        $this->assertNull($this->toolbox->getDosingMethod('MadeUpName'));
    }
}

