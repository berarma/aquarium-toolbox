<?php
namespace AquaTx\Test;

use AquaTx\Provider;
use AquaTx\Conversion\Mass;
use AquaTx\Conversion\Volume;
use AquaTx\Conversion\Concentration;

class ProviderTest extends \PHPUnit\Framework\TestCase
{

    protected $provider;

    public function setUp()
    {
        $this->provider = new Provider();
    }

    public function testListDryCompounds()
    {
        $this->assertContains('KNO3', $this->provider->listDryCompounds());
    }

    public function testListWetCompounds()
    {
        $this->assertContains('Easy Life ProFito', $this->provider->listWetCompounds());
    }

    public function testListDosingMethods()
    {
        $this->assertContains('EI', $this->provider->listDosingMethods());
    }

    public function testGetDryCompound()
    {
        $compound = $this->provider->getDryCompound('KNO3');
        $this->assertInstanceOf('AquaTx\Compound', $compound);
        $this->assertEquals(1, $compound->getMass()->toUnit());
        $compound = $this->provider->getDryCompound('KNO3', new Mass(1, 'g'));
        $this->assertInstanceOf('AquaTx\Compound', $compound);
        $this->assertEquals(1e-3, $compound->getMass()->toUnit());
    }

    public function testGetDryCompoundNotExists()
    {
        $this->assertNull($this->provider->getDryCompound('MadeUpName'));
    }

    public function testGetWetCompound()
    {
        $compound = $this->provider->getWetCompound('Easy Life ProFito');
        $this->assertInstanceOf('AquaTx\Solution', $compound);
        $this->assertEquals(1, $compound->getVolume()->toUnit());
        $compound = $this->provider->getWetCompound('Easy Life ProFito', new Volume(1, 'ml'));
        $this->assertInstanceOf('AquaTx\Solution', $compound);
        $this->assertEquals(1e-3, $compound->getVolume()->toUnit());
    }

    public function testGetWetCompoundNotExists()
    {
        $this->assertNull($this->provider->getWetCompound('MadeUpName'));
    }

    public function testGetDosingMethod()
    {
        $this->assertInstanceOf('AquaTx\DosingMethod', $this->provider->getDosingMethod('EI'));
    }

    public function testGetDosingMethodNotExists()
    {
        $this->assertNull($this->provider->getDosingMethod('MadeUpName'));
    }
}
