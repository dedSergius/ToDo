<?php

namespace App\Models;

use App\Core\Model;
use Exception;


/**
 * User Model:
 *
 * @author Sergey Lukin <contact@lukin.site>
 */
class User extends Model
{


    /**
     * Get Instance: Returns an instance of the User model if the specified user
     * exists in the database.
     * @access public
     * @param string $user
     * @return User|null
     */
    public static function getInstance($user)
    {
        $User = new User();
        if ($User->findUser($user)->exists()) {
            return $User;
        }
        return null;
    }

    /**
     * Find User: Retrieves and stores a specified user record from the database
     * into a class property. Returns true if the record was found, or false if
     * not.
     * @access public
     * @param string $user
     * @return Model
     */
    public function findUser($user)
    {
        $field = filter_var($user, FILTER_VALIDATE_EMAIL) ? "email" : (is_numeric($user) ? "id" : "username");
        return ($this->find("users", [$field, "=", $user]));
    }


}
