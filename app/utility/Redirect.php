<?php

namespace App\Utility;

/**
 * Redirect:
 *
 * @author Sergey Lukin <contact@lukin.site>
 */
class Redirect
{

    /**
     * To: Redirects to a specific path.
     * @access public
     * @param string $location [optional]
     * @return void
     */
    public static function to($location = "")
    {
        if ($location) {
            if ($location === 404) {
                header('HTTP/1.0 404 Not Found');
                include VIEW_PATH . DEFAULT_404_PATH;
            } else {
                header("Location: " . $location);
            }
            exit();
        }
    }

}
