<?php 
    // include db constant
    include_once "constants.php";

    //class definition
    class DbConfig{
        // member variable
        protected $dbcon;

        // member functions
        protected function __construct(){
            $this->dbcon = new Mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASENAME);

            // Check connection
            if ($this->dbcon->connect_error) {
                die("Connection Failed: ".$this->dbcon->connect_error);
            }
        }
    }
?>