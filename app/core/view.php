<?php

namespace App\Core;

/**
 * Core View:
 *
 * @author Sergey Lukin <contact@lukin.site>
 */
class View
{

    /** @var string The title of the page. */
    protected $title = "";

    /**
     * Add Data: Loops through an array of data, setting the key and value as
     * class properties so that it can be accessed in the views HTML.
     * @access public
     * @param array $data
     * @return void
     */
    public function addData(array $data)
    {
        foreach ($data as $key => $value) {
            $this->{$key} = $value;
        }
    }

    /**
     * Escape HTML: Converts all applicable characters to HTML entities.
     * @param string $string
     * @return string
     */
    public function escapeHTML($string)
    {
        return (htmlentities($string, HTMLENTITIES_FLAGS, HTMLENTITIES_ENCODING, HTMLENTITIES_DOUBLE_ENCODE));
    }

    /**
     * Get File: Requires in a view file if it exists.
     * @access public
     * @param string $filepath
     * @return void
     */
    public function getFile($filepath)
    {
        $filename = VIEW_PATH . $filepath . ".php";
        if (file_exists($filename)) {
            require $filename;
        }
    }

    /**
     * Make URL: Creates and returns a clean internal URL.
     * @param mixed $path [optional]
     * @return string
     */
    public function makeURL($path = "")
    {
        if (is_array($path)) {
            return (APP_URL . implode("/", $path));
        }
        return (APP_URL . $path);
    }

    /**
     * Render: Requires in a view file and sets any view data if specified.
     * @access public
     * @param string $filepath
     * @param array $data [optional]
     * @return void
     */
    public function render($filepath, array $data = [])
    {
        $this->addData($data);
        $this->getFile(DEFAULT_HEADER_PATH);
        $this->getFile($filepath);
        $this->getFile(DEFAULT_FOOTER_PATH);
    }

    /**
     * Render Without Header and Footer: Requires in a view file and sets any
     * view data if specified, without the header and footer templates.
     * @access public
     * @param string $filepath
     * @param array $data [optional]
     * @return void
     */
    public function renderWithoutHeaderAndFooter($filepath, array $data = [])
    {
        $this->addData($data);
        $this->getFile($filepath);
    }

}
