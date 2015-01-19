<?php
/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 19/01/15
 * Time: 15:35
 */

namespace components;


interface ComponentInterface {

    /**
     * Provides an instance of the component created
     * @return $this|mixed
     */
    public static function getInstance();
} 