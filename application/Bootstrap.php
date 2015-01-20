<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

    protected function _initAutoloader()
    {
        $loader = function($className)
        {
            $path = APPLICATION_PATH.DIRECTORY_SEPARATOR.str_replace("\\", DIRECTORY_SEPARATOR, $className) . '.php';
            if(file_exists($path))
            {
                require_once $path;
            }
        };

        $autoloader = Zend_Loader_Autoloader::getInstance();
        $autoloader->pushAutoloader($loader, 'components\\');
    }
}

