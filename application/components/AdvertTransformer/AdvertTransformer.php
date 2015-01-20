<?php
/**
 * @author Samuel I Amaziro
 */
namespace components\AdvertTransformer;


use components\AbstractComponent;
use components\AbstractComponentInjector;
use components\AdvertTransformer\versions\v1\AdvertTransformer as version1AdvertTransformer;

/**
 * Class AdvertTransformer
 * @package components\AdvertTransformer
 */
class AdvertTransformer extends AbstractComponent
{

    /**
     * Loads a component based on current version
     */
    protected function loadComponent()
    {
        switch($this->currentVersion)
        {
            case "1.0":
                self::$instance = new version1AdvertTransformer();
                break;
            default:
                self::$instance = $this;
                break;
        }
    }

    /**
     * Returns an instance of the component
     * @param AbstractComponentInjector $componentInjector
     * @return null|$this|\components\AdvertTransformer\versions\v1\AdvertTransformer
     */
    public function getInstance(AbstractComponentInjector $componentInjector)
    {
        $this->loadComponent();
        $componentInjector->inject(self::$instance);
        return self::$instance;
    }


} 