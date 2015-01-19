<?php
/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 19/01/15
 * Time: 14:49
 */

namespace components\UserManager;


class DoctrineUserManagerDAO extends UserManagerDAO{

    /**
     * Get a given student by the user id
     * @throws |Exception
     * @param $userId
     * @return array
     */
    public function getUserWithUserId($userId)
    {
        throw new \Exception(__FUNCTION__." Not implemented");
    }

    /**
     * Creates a new user
     * @throws |Exception
     * @param array $user
     * @return bool
     */
    public function insertNewUser(array $user)
    {
        throw new \Exception(__FUNCTION__." Not implemented");
    }

    /**
     * Updates a given user
     * @throws |Exception
     * @param array $user
     * @return bool
     */
    public function updateUser(array $user)
    {
        throw new \Exception(__FUNCTION__." Not implemented");
    }


} 