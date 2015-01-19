<?php
/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 16/01/15
 * Time: 15:14
 */

namespace components\UserManager;


use components\AbstractComponent;
use components\ComponentInterface;
use components\UserManager\versions\v1\UserManager as v1UserManager;

class UserManager extends AbstractComponent implements ComponentInterface
{
    /**
     * Loads a component based on current version
     * @return mixed
     */
    protected function loadComponent()
    {
        switch($this->currentVersion)
        {
            case "1.0":
                self::$instance = ((!is_null(self::$instance) && self::$instance instanceof v1UserManager) ? self::$instance : new v1UserManager());
                break;
            default:
                self::$instance = $this;
                break;
        }
    }

    /**
     * Provides an instance of the component created
     * @return $this|mixed
     */
    public static function getInstance()
    {
        self::loadComponent();

        return self::$instance;
    }


} 