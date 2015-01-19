<?php

class IndexController extends Zend_Controller_Action
{
    private $component;

    public function init()
    {

    }

    public function indexAction()
    {
        $injector = new \components\UserManager\UserManagerInjector();
        $injector->needed(array("database_connection"));
        $injector->setDAO("doctrine");
        $component = new \components\UserManager\UserManager($injector);
        $this->component = $component;
        $component::getInstance();
        echo "i am here";
        //var_dump($component::getInstance());
    }


}

