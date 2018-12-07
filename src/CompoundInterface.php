<?php
/**
 * AquariumToolbox
 *
 * Copyright (c) Bernat Arlandis Mañó
 *
 * @copyright Bernat Arlandis Mañó
 */
namespace AquaTx;

/**
 * Basic interface of a compound.
 */
interface CompoundInterface
{

    /**
     * Gets compound mass.
     *
     * @return Mass Compound mass.
     */
    public function getMass();

    /**
     * Gets compound volume.
     *
     * This is the wet compound volume or the approximated bulk dry compound
     * volume.
     *
     * @return Volume Compound volume.
     */
    public function getVolume();

    /**
     * Gets the proxy element in the compound.
     *
     * @return string Proxy element name.
     */
    public function getProxyElement();

    /**
     * Lists elements found in the compound by name.
     *
     * @return string[] Compound name list.
     */
    public function listElements();

    /**
     * Gets amount of an element in the compound.
     *
     * @param string|null $element Element name or null for the proxy element.
     *
     * @return Mass Quantity of the element.
     */
    public function element($element = null);
}
