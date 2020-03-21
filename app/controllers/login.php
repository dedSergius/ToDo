<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\UserLogin;
use App\Utility;

/**
 * Login Controller:
 *
 * @author Sergey Lukin <contact@lukin.site>
 */
class Login extends Controller
{

    /**
     * Index: Renders the login view.
     * @access public
     * @return void
     * @example login/index
     */
    public function index()
    {

        // Check that the user is unauthenticated.
        Utility\Auth::checkUnauthenticated();

        // Set any dependencies, data and render the view.
        $this->view->render("login", [
            "title" => "Войти"
        ]);
    }

    /**
     * Login: Processes a login request.
     * @access public
     * @return void
     * @example login/login
     */
    public function login()
    {

        // Check that the user is unauthenticated.
        Utility\Auth::checkUnauthenticated();

        // Process the login request, redirecting to the home controller if
        // successful or back to the login controller if not.
        if (UserLogin::login()) {
            Utility\Redirect::to(APP_URL);
        }
        Utility\Redirect::to(APP_URL . "login");
    }

    /**
     * Login With Cookie: Processes a login with cookie request.
     * @access public
     * @return void
     * @example login/loginWithCookie
     */
    public function loginWithCookie()
    {

        // Check that the user is unauthenticated.
        Utility\Auth::checkUnauthenticated();

        // Process the login with cookie request, redirecting to the home
        // controller if successful or back to the login controller if not.
        if (UserLogin::loginWithCookie()) {
            Utility\Redirect::to(APP_URL);
        }
        Utility\Redirect::to(APP_URL . "login");
    }


}
