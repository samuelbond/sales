<?php
/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 16/01/15
 * Time: 15:55
 */

namespace components\UserManager;


use components\AbstractComponent;
use components\AbstractComponentInjector;
use Doctrine\ORM\EntityManager;

class UserManagerInjector extends AbstractComponentInjector{

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
        throw new \Exception("Invalid or incomplete parameters provided");
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
            case "doctrine":
                $dao = new DoctrineUserManagerDAO();
                $dao->setConn(self::$configuration['database_connection']);
                $component->setDao($dao);
                break;
            case "mysqli":
                $dao = new MysqliUserManagerDAO();
                $dao->setConn(self::$configuration['database_connection']);
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