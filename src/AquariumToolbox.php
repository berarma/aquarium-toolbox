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

/**
 * Main class serving as the primary source for other objects and data.
 */
class AquariumToolbox
{

    /**
     * @var array Data about compounds and dosing methods.
     */
    protected $data;

    /**
     * Class constructor.
     *
     * This constructor will usually be called without parameters to load the
     * default library data. Loading other data sets is mainly meant for
     * testing.
     *
     * @param array|null $data Data about compounds and dosing methods. When
     * null default data will be loaded.
     */
    public function __construct(array $data = null)
    {
        if ($data === null) {
            $data = require(__DIR__ . '/../data/' . 'main.php');
        }
        $this->data = $data;
        foreach ($this->data['wetCompounds'] as $cName => $cdata) {
            foreach ($cdata['elements'] as $eName => $eData) {
                $this->data['wetCompounds'][$cName]['elements'][$eName] /= 100;
            }
        }
    }

    /**
     * Lists all dry compounds available.
     *
     * @return array Dry compound names.
     */
    public function listDryCompounds()
    {
        return array_keys($this->data['dryCompounds']);
    }

    /**
     * Lists all wet compounds available.
     *
     * @return array Wet compound names.
     */
    public function listWetCompounds()
    {
        return array_keys($this->data['wetCompounds']);
    }

    /**
     * Lists all dosing methods available.
     *
     * @return array Dosing method names.
     */
    public function listDosingMethods()
    {
        return array_keys($this->data['dosingMethods']);
    }

    /**
     * Gets dry compound dose by name and quantity.
     *
     * @param string $compoundId Dry compound name.
     * @param Mass $mass Quantity of the compound.
     *
     * @return Compound Compound object.
     */
    public function getDryCompound($compoundId, Mass $mass = null)
    {
        if (!array_key_exists($compoundId, $this->data['dryCompounds'])) {
            return null;
        }
        return new Compound($this->data['dryCompounds'][$compoundId], $mass);
    }

    /**
     * Gets wet compound dose by name and quantity.
     *
     * @param string $compoundId Wet compound name.
     * @param Volume $volume Quantity of the compound.
     *
     * @return Solution Solution object.
     */
    public function getWetCompound($compoundId, Volume $volume = null)
    {
        if (!array_key_exists($compoundId, $this->data['wetCompounds'])) {
            return null;
        }
        if ($volume === null) {
            $volume = new Volume(1);
        }
        $compound = new Compound($this->data['wetCompounds'][$compoundId], new Mass($volume->toUnit('l')));
        return new Solution($compound, $volume);
    }

    /**
     * Gets dosing method by name.
     *
     * @param string $methodId Dosing method name.
     *
     * @return DosingMethod Dosing method object.
     */
    public function getDosingMethod($methodId)
    {
        if (!array_key_exists($methodId, $this->data['dosingMethods'])) {
            return null;
        }
        return new DosingMethod($this->data['dosingMethods'][$methodId]);
    }
}
