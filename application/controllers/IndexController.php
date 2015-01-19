<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
       $injector = new \components\UserManager\UserManagerInjector();
        $injector->needed(array("database_connection"));
        $injector->setDAO("doctrine");
        $component = new \components\UserManager\UserManager($injector);
        echo "i am here";
        //var_dump($component::getInstance());
    }


}

