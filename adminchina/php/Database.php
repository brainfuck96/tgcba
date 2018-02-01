<?php
class Database {
    //private $_connection;
    //private static $_instance; //The single instance

    /*public static function getInstance() {
        if(!self::$_instance) { // If no instance then make one
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    private function __construct() {
        $this->_connection = new mysqli($this->_host, $this->_username,
            $this->_password, $this->_database);

        // Error handling
        if(mysqli_connect_error()) {
            trigger_error("Failed to conencto to MySQL: " . mysqli_connect_error(),
                E_USER_ERROR);
        }
    }
    // Magic method clone is empty to prevent duplication of connection
    private function __clone() { }
    // Get mysqli connection
    public function getConnection() {
        return $this->_connection;
    }*/
    public static function getConnection()
    {
        error_reporting(E_ALL & ~E_WARNING);
        $connection = new mysqli(self::$_host, self::$_username,
            self::$_password, self::$_database);
        $connection->set_charset("utf8");
        if (self::__isErrors())
        {
            return null;
        }
        else
        {
            return $connection;
        }
    }

    private static function __isErrors() {
        if(mysqli_connect_error()) {
            return true;
        }
        else {
            return false;
        }
    }
}
