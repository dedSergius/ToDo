<?php

namespace App\Core;

use App\Utility;

/**
 * Core Model:
 *
 * @author Sergey Lukin <contact@lukin.site>
 */
class Model
{

    /** @var Database An instance of the database class. */
    protected $Db = null;

    /** @var array The record from the database */
    protected $data = [];

    /**
     * Construct:
     * @access public
     */
    public function __construct()
    {
        $this->Db = Utility\Database::getInstance();
    }

    /**
     * Create: Inserts a new record into the database, returning the unique
     * record ID if successful, otherwise returns false.
     * @access protected
     * @param string $table
     * @param array $fields
     * @return string|boolean
     * @throws Exception
     */
    protected function create($table, array $fields)
    {
        return ($this->Db->insert($table, $fields));
    }

    /**
     * Data: Returns the record data from the database.
     * @access public
     * @return array
     */
    public function data()
    {
        return ($this->data);
    }

    /**
     * Exists: Returns true if the record data has been pulled from the database
     * and stored in a class property, or false if not.
     * @access public
     * @return boolean
     */
    public function exists()
    {
        return (!empty($this->data));
    }

    /**
     * Find: Retrieves and stores a specified record from the database into a
     * class property. Returns true if the record was found, or false if not.
     * @access protected
     * @param string $table
     * @param array $where
     * @return \App\Core\Model
     */
    protected function find($table, array $where = [])
    {
        $data = $this->Db->query("SELECT * FROM `{$table}` WHERE `{$where[0]}` = \"{$where[2]}\"");
        if ($data->count()) {
            $this->data = $data->results(0);
        }
        return $this;
    }

}
