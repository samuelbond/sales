<?php
/**
 * @author Samuel I Amaziro
 */

namespace components;

/**
 * Class AbstractComponentInjector
 * @package components
 */
Abstract Class AbstractComponentInjector {

    /**
     *
     * @param array $myNeededConfigurationParameters
     * @throws |Exception
     * @return void
     */
    abstract public function needed(array $myNeededConfigurationParameters);

    /**
     * Injects dependency to component
     * @param AbstractComponent $component
     * @return void
     */
    abstract public function inject(AbstractComponent $component);

    /**
     * Sets the type of DAO(Data Access Object) a component should use
     * @param $type
     * @return mixed
     */
    abstract public function setDAO($type);
} 