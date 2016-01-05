<?php
namespace Berarma\AquariumToolbox;

use Berarma\AquariumToolbox\Conversion\Mass;
use Berarma\AquariumToolbox\Conversion\Volume;
use Berarma\AquariumToolbox\Conversion\Concentration;

class Solution implements CompoundInterface
{

    protected $compound;

    protected $volume;

    public function __construct(CompoundInterface $solute, Volume $volume)
    {
        $this->compound = $solute;
        $this->volume = $volume;
    }

    public function getCompound()
    {
        return $this->compound;
    }

    public function getMass()
    {
        return new Mass($this->volume->toUnit());
    }

    public function getVolume()
    {
        return $this->volume;
    }

    public function getProxyElement()
    {
        return $this->getCompound()->getProxyElement();
    }

    public function listElements()
    {
        return $this->getCompound()->listElements();
    }

    public function element($element = null)
    {
        return $this->getCompound()->element($element);
    }

    public function concentration($element = null)
    {
        if ($element === null) {
            return new Concentration($this->getCompound()->getMass()->toUnit('mg') / $this->getVolume()->toUnit('l'), 'ppm');
        } else {
            return new Concentration($this->element($element)->toUnit('mg') / $this->getVolume()->toUnit('l'), 'ppm');
        }
    }

    public function gh()
    {
        /*
         * 1 dGH is defined as 10mg of CaO per litre of water. X mols of Ca and
         * Y mols of Mg have the same effect on GH as X+Y mols of CaO.
         * Converting Ca and Mg mass to equivalent CaO mass we can get the
         * resulting dGH.
         * CaO molar mass is 56.0774 g/mol.
         * Ca molar mass is 40.078 g/mol.
         * Mg molar mass is 24.305 g/mol.
         */
        static $caHardnessFactor = 56.0774 / 40.078 / 0.01;
        static $mgHardnessFactor = 56.0774 / 24.305 / 0.01;

        return ($this->element('Ca')->toUnit('g') * $caHardnessFactor + $this->element('Mg')->toUnit('g') * $mgHardnessFactor) / $this->getVolume()->toUnit('l');
    }

    public function kh()
    {
        /*
         * 1dKH is defined as 17.848mg of CaCO3 per litre of water. X mols of
         * CO3 and Y mols of HCO3 have the same effect on KH as X + Y/2 mols of
         * CaCO3. Converting CO3 and HCO3 mass to equivalent CaCO3 mass we can
         * get the resulting dKH.
         * CaCO3 molar mass is 100.0869 g/mol
         * CO3 molar mass is 60.0089 g/mol
         * HCO3 molar mass is 61.0168 g/mol
         */
        static $co3HardnessFactor = 100.0869 / 60.0089 / 0.017848;
        static $hco3HardnessFactor = 100.0869 / 61.0168 / 0.017848 / 2;

        return ($this->element('CO3')->toUnit('g') * $co3HardnessFactor + $this->element('HCO3')->toUnit('g') * $hco3HardnessFactor) / $this->getVolume()->toUnit('l');
    }
}

