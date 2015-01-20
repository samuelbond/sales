<?php

// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

// Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'testing'));

// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH . '/../library'),
    get_include_path(),
)));

define('PUBLIC_PATH', dirname(realpath(dirname(__FILE__))).DIRECTORY_SEPARATOR."public".DIRECTORY_SEPARATOR);

require_once dirname(PUBLIC_PATH).DIRECTORY_SEPARATOR."vendor".DIRECTORY_SEPARATOR."autoload.php";

//require_once 'Zend/Loader/Autoloader.php';
$loader = function($className)
{
    $path = APPLICATION_PATH.DIRECTORY_SEPARATOR.str_replace("\\", DIRECTORY_SEPARATOR, $className) . '.php';
    if(file_exists($path))
    {
        require_once $path;
    }
};
spl_autoload_register($loader);
//$autoloader = Zend_Loader_Autoloader::getInstance();
//$autoloader->pushAutoloader($loader, 'components\\');