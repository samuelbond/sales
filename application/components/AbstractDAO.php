<?php
/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 16/01/15
 * Time: 16:49
 */

namespace components;


Abstract class AbstractDAO {

    /**
     * Contains access to data store depending on type of DAO
     * @var mixed
     */
    protected static $conn;

    /**
     * Provides a way to find a specific item
     * @param array $item
     * @throws |Exception
     * @return mixed
     */
    abstract public function find(array $item);

    /**
     * Sets the connection to a data store
     * @param $conn
     */
    public function setConn($conn)
    {
        if(self::$conn !== $conn)
        {
            self::$conn = $conn;
        }
    }
} 