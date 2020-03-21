<?php

namespace App\Utility;

use PDO;
use PDOException;

/**
 * Database:
 *
 * @author Sergey Lukin <contact@lukin.site>
 */
class Database
{

    /** @var Database */
    private static $_Database = null;

    /** @var PDO */
    private $_PDO = null;

    /** @var PDOStatement */
    private $_query = null;

    /** @var boolean */
    private $_error = false;

    /** @var array */
    private $_results = [];

    /** @var integer */
    private $_count = 0;

    /**
     * Construct:
     * @access private
     */
    private function __construct()
    {
        try {
            $host = Config::get("DATABASE_HOST");
            $name = Config::get("DATABASE_NAME");
            $username = Config::get("DATABASE_USERNAME");
            $password = Config::get("DATABASE_PASSWORD");
            $this->_PDO = new PDO("mysql:host={$host};dbname={$name}", $username, $password);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    /**
     * Error:
     * @access public
     * @return boolean
     */
    public function error()
    {
        return ($this->_error);
    }


    /**
     * Get Instance:
     * @access public
     * @return Database
     */
    public static function getInstance()
    {
        if (!isset(self::$_Database)) {
            self::$_Database = new Database();
        }
        return (self::$_Database);
    }

    /**
     * Query:
     * @access public
     * @param string $sql
     * @param array $params [optional]
     * @return Database
     */
    public function query($sql, array $params = [])
    {
        $this->_count = 0;
        $this->_error = false;
        $this->_results = [];
        if (($this->_query = $this->_PDO->prepare($sql))) {
            foreach ($params as $key => $value) {
                $this->_query->bindValue($key, $value);
            }
            if ($this->_query->execute()) {
                $this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
                $this->_count = $this->_query->rowCount();
            } else {
                $this->_error = true;
            }
        }
        return $this;
    }

    /**
     * Count:
     * @access public
     * @return integer
     */
    public function count()
    {
        return ($this->_count);
    }

    /**
     * Results:
     * @access public
     * @param integer $key [optional]
     * @return array
     */
    public function results($key = null)
    {
        return (isset($key) ? $this->_results[$key] : $this->_results);
    }


}
