<?php
/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 16/01/15
 * Time: 15:20
 */

namespace components;


Abstract Class AbstractComponent
{
    /**
     * @var string
     */
    protected $currentVersion = "1.0";
    /**
     * @var null|AbstractComponent
     */
    protected static $instance = null;
    /**
     * @var null|AbstractDAO
     */
    protected $dao;
    /**
     * Contains needed parameters passed to component
     * @var null|array
     */
    private static $configuration;

    /**
     * @param AbstractComponentInjector $componentInjector
     */
    abstract public function __construct(AbstractComponentInjector $componentInjector = null);

    /**
     * Loads a component based on current version
     * @return void
     */
    abstract protected function loadComponent();

    /**
     * Gets the current version of the component
     * @return string
     */
    public function getCurrentVersion()
    {
        return $this->currentVersion;
    }
    /**
     * Returns an array of available versions for a component
     * @return array
     */
    public function getAvailableVersions()
    {
        return array($this->getCurrentVersion());
    }
    /**
     * Sets the version to use if called before loadComponent to the provided version if on the list of available versions
     * @param $version
     */
    public function setCurrentVersion($version)
    {
        if(in_array($version, $this->getAvailableVersions()))
        {
            $this->currentVersion = $version;
        }
    }

    /**
     * @param \components\AbstractDAO|null $dao
     */
    public function setDao($dao)
    {
        $this->dao = $dao;
    }

    /**
     * @param array|null $configuration
     */
    public static function setConfiguration($configuration)
    {
        self::$configuration = $configuration;
    }



}