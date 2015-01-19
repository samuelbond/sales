<?php
/**
 * @author Samuel I Amaziro
 */

namespace components\AdvertTransformer;


use components\AbstractComponent;
use components\AbstractComponentInjector;

/**
 * Class AdvertTransformerInjector
 * @package components\AdvertTransformer
 */
class AdvertTransformerInjector extends AbstractComponentInjector{

    private static $configuration;
    /**
     * @var null|string
     */
    private $daoType;


    /**
     * @param array $parameters
     * @throws \Exception
     */
    public function needed(array $parameters)
    {
        self::$configuration = $parameters;
    }


    /**
     * Injects dependency to component
     * @param AbstractComponent $component
     * @return void
     */
    public function inject(AbstractComponent $component)
    {

        switch($this->daoType)
        {
            case "xml":
                $dao = new XMLAdvertTransformerDAO();
                $dao->setDataStoreName(self::$configuration['data_source_file_name']);
                $dao->setDefaultFilePath(self::$configuration['file_path']);
                $component->setDao($dao);
                break;
        }

        $component::setConfiguration(self::$configuration);
    }

    /**
     * Sets the type of DAO(Data Access Object) a component should use
     * @param $type
     * @return mixed
     */
    public function setDAO($type)
    {
        $this->daoType = $type;
    }


} 