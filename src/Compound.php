<?php
/**
 * AquariumToolbox
 *
 * Copyright (c) Bernat Arlandis Mañó
 *
 * @copyright Bernat Arlandis Mañó
 */
namespace Berarma\AquariumToolbox;

use Berarma\AquariumToolbox\Conversion\Mass;
use Berarma\AquariumToolbox\Conversion\Volume;
use Berarma\AquariumToolbox\Conversion\Concentration;

/**
 * Compound class.
 *
 * Instances of this class represent a given quantity of a compound.
 */
class Compound implements CompoundInterface
{

    /**
     * @var array Data about the compound.
     */
    protected $data;

    /**
     * @var Mass Compound quantity.
     */
    protected $mass;

    /**
     * Compound constructor.
     *
     * @param array $data Compound definition data.
     * @param Mass $mass Quantity of compound.
     */
    public function __construct(array $data, Mass $mass = null)
    {
        if ($mass === null) {
            $mass = new Mass(1);
        }
        $this->data = $data;
        $this->mass = $mass;
    }

    /**
     * {@inheritDoc}
     */
    public function getMass()
    {
        return $this->mass;
    }

    /**
     * {@inheritDoc}
     */
    public function getVolume()
    {
        return new Volume($this->getMass()->toUnit('mg') / $this->data['tsp'] * 5, 'ml');
    }

    /**
     * {@inheritDoc}
     */
    public function getSolubility()
    {
        return new Concentration($this->data['sol'], 'mg/ml');
    }

    /**
     * {@inheritDoc}
     */
    public function getProxyElement()
    {
        return $this->data['target'];
    }

    /**
     * {@inheritDoc}
     */
    public function listElements()
    {
        return array_keys($this->data['elements']);
    }

    /**
     * {@inheritDoc}
     */
    public function element($element = null)
    {
        if ($element === null) {
            $element = $this->getProxyElement();
        }
        if (!array_key_exists($element, $this->data['elements'])) {
            return new Mass(0);
        }
        return new Mass($this->data['elements'][$element] * $this->mass->toUnit());
    }
}
