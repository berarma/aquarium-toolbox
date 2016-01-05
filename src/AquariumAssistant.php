<?php
/**
 * AquariumToolbox
 *
 * Copyright (c) Bernat Arlandis Mañó
 *
 * @copyright Bernat Arlandis Mañó
 */
namespace Berarma\AquariumToolbox;

use Berarma\AquariumToolbox\Conversion\Volume;
use Berarma\AquariumToolbox\Conversion\Concentration;

/**
 * Assistant class for typical calculations.
 *
 * Helps with the calculations typically used.
 */
class AquariumAssistant
{

    /**
     * @var Volume $volume Water volume used for calculations.
     */
    protected $volume;

    /**
     * Constructor.
     *
     * @param Volume $volume Volume of water to base calculations on.
     */
    public function __construct(Volume $volume)
    {
        $this->setVolume($volume);
    }

    /**
     * Set water volume used for calculations.
     *
     * @param Volume $volume Volume of water to base calculations on.
     */
    public function setVolume(Volume $volume)
    {
        $this->volume = $volume;
    }

    /**
     * Compound needed to reach a target concentration for an element.
     *
     * In case no element is specified the default proxy element for the
     * compound is used.
     *
     * @param Concentration $target Target concentration.
     * @param CompoundInterface $compound Compound to be added.
     * @param string|null $element Element used for target.
     *
     * @throws ImpossibleCalculation When the target concentration is impossible.
     *
     * @return float Times the compound should be added to reach the target.
     */
    public function targetElement(Concentration $target, CompoundInterface $compound, $element = null)
    {
        if ($target->toUnit() * $compound->getVolume()->toUnit() >= $compound->element($element)->toUnit()) {
            throw new ImpossibleCalculation();
        }
        return $target->toUnit() * $this->volume->toUnit() / ($compound->element($element)->toUnit() - $target->toUnit() * $compound->getVolume()->toUnit());
    }

    /**
     * Compound needed to reach the target concentration required by a dosing
     * method.
     *
     * In case no element is specified the default proxy element for the
     * compound is used.
     *
     * @param DosingMethod $method Dosing method to use.
     * @param CompoundInterface $compound Compound to be added.
     * @param string|null $element Element used for target.
     *
     * @throws ImpossibleCalculation When the target concentration is impossible.
     *
     * @return float Times the compound should be added to reach the target.
     */
    public function targetDosingMethod(DosingMethod $method, CompoundInterface $compound, $element)
    {
        if ($element === null) {
            $element = $compound->getProxyElement();
        }
        return $this->targetElement($method->element($element), $compound, $element);
    }

    /**
     * Compound needed to reach target GH.
     *
     * @param float $gh GH target value.
     * @param CompoundInterface $compound Compound to be added.
     *
     * @throws ImpossibleCalculation When the target GH is impossible to reach.
     *
     * @return float Times the compound should be added to reach the target.
     */
    public function targetGh($gh, CompoundInterface $compound)
    {
        if (!$compound instanceof Solution) {
            $solution = new Solution($compound, new Volume(1, 'l'));
        } else {
            $solution = $compound;
        }
        if ($compound->getVolume()->toUnit() * $gh >= $solution->getVolume()->toUnit() * $solution->gh()) {
            throw new ImpossibleCalculation();
        }
        return $gh * $this->volume->toUnit() / ($solution->getVolume()->toUnit() * $solution->gh() - $compound->getVolume()->toUnit() * $gh);
    }

    /**
     * Compound needed to reach target KH.
     *
     * @param float $kh KH target value.
     * @param CompoundInterface $compound Compound to be added.
     *
     * @throws ImpossibleCalculation When the target KH is impossible to reach.
     *
     * @return float Times the compound should be added to reach the target.
     */
    public function targetKh($kh, CompoundInterface $compound)
    {
        if (!$compound instanceof Solution) {
            $solution = new Solution($compound, new Volume(1, 'l'));
        } else {
            $solution = $compound;
        }
        if ($compound->getVolume()->toUnit() * $kh >= $solution->getVolume()->toUnit() * $solution->kh()) {
            throw new ImpossibleCalculation();
        }
        return $kh * $this->volume->toUnit() / ($solution->getVolume()->toUnit() * $solution->kh() - $compound->getVolume()->toUnit() * $kh);
    }

    /**
     * Calculate the effects of adding a compound.
     *
     * Returns a solution object where the water in the tank is the solvent and
     * the added compound is the solute.
     *
     * @param CompoundInterface $compound Compound added.
     *
     * @return Solution Tank water as a solution.
     */
    public function effectsOf(CompoundInterface $compound)
    {
        return new Solution($compound, new Volume($this->volume->toUnit() + $compound->getVolume()->toUnit()));
    }
}

