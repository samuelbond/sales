<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

    protected function _initAutoloader()
    {

        $loader = function($className) {

            $path = APPLICATION_PATH.DIRECTORY_SEPARATOR.str_replace("\\", DIRECTORY_SEPARATOR, $className) . '.php';

            if(file_exists($path))
            {
                require_once $path;
            }
            else
            {

                @$list = explode("\\", $className);
                @$path = APPLICATION_PATH.$list[4].DIRECTORY_SEPARATOR.$list[5].DIRECTORY_SEPARATOR.$list[2].DIRECTORY_SEPARATOR.$list[3].$list[4].$list[5].$list[6].".php";
                if(file_exists($path))
                {
                    require_once $path;
                }
            }
        };

        $autoloader = Zend_Loader_Autoloader::getInstance();
        $autoloader->pushAutoloader($loader, 'components\\');
    }
}

