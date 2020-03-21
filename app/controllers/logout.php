<?php


namespace App\Controllers;

use App\Models\UserLogin;
use App\Utility;

/**
 * Logout Controller:
 *
 * @author Sergey Lukin <contact@lukin.site>
 */
class Logout extends \App\Core\Controller
{
    /**
     * Logout: Processes a logout request.
     * @access public
     * @return void
     * @example logout
     */
    public function index()
    {

        // Check that the user is authenticated.
        Utility\Auth::checkAuthenticated();

        // Process the logout request, redirecting to the login controller if
        // successful or to the default controller if not.
        if (UserLogin::logout()) {
            Utility\Redirect::to(APP_URL . "login");
        }
        Utility\Redirect::to(APP_URL);
    }
}

?>