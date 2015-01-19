<?php
/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 19/01/15
 * Time: 14:36
 */

namespace components\UserManager;


use components\AbstractDAO;

abstract class UserManagerDAO extends AbstractDAO{
    /**
     * Provides a way to find a specific item
     * @param array $item
     * @throws |Exception
     * @return mixed
     */
    public function find(array $item)
    {
        throw new \Exception("Unsupported method");
    }

    /**
     * Get a given student by the user id
     * @throws |Exception
     * @param $userId
     * @return array
     */
    abstract public function getUserWithUserId($userId);

    /**
     * Creates a new user
     * @throws |Exception
     * @param array $user
     * @return bool
     */
    abstract public function insertNewUser(array $user);

    /**
     * Updates a given user
     * @throws |Exception
     * @param array $user
     * @return bool
     */
    abstract public function updateUser(array $user);


} 