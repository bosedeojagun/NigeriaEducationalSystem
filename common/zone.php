<?php 
    // include

    include_once("constants.php");

    //  class definition
    class Zone{
        // member variables
        public $stateid;
        public $statename;
        public $lgaid;
        public $lganame;
        public $conn; // database connection handler

        // member functions
        public function __construct(){

            // open connection by creating mysqli object
            $this->conn = new Mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASENAME);

            // check if connected
            if ($this->conn->connect_error) {
                die("Connection Failed: ".$this->conn->connect_error);
            }
        }

        # begin getStates method
        public function getStates(){
            // prepare statement
            $statement = $this->conn->prepare("SELECT * FROM state");

            // execute
            $statement->execute();

            // get result
            $result = $statement->get_result();

            // fetch result
            if ($result->num_rows > 0) {
                $records = array();
                while($row = $result->fetch_assoc()){
                    $data[] = $row;
                }
            }

            return $data;
        }
        # end getStates method

        # begin getlga
        public function getLga($stateid){
            // prepare statement

            $statement = $this->conn->prepare("SELECT * FROM lga WHERE state_id = ?");

            // bind parameter
            $statement->bind_param("i",$stateid);

            //  execute
            $statement->execute();

            // get Result
            $result = $statement->get_result();

            // check if it has result
            $records = array();
            if ($result->num_rows > 0) {
               while ($row = $result->fetch_assoc()) {
                $records[] = $row;
               }
            }

            return $records;
        }
        # end getlga
    }
?>