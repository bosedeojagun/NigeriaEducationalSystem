<?php 
    // add database class file
    include_once "dbconfig.php";

    // report class definition
    class Report extends DbConfig{

        // member variables


        // member functions
        public function __construct(){
            // use parent constructor to connect to DB
            parent::__construct();
        }

        public function displayStudents(){
            $statement = $this->dbcon->prepare("SELECT * FROM school");
            $statement->execute();
            $result = $statement->get_result();

            $data = $result->fetch_all();

            return $data;
        }

        # joining statement

        # begin fetch State & LGA
        public function getStateLga(){
            $statement = $this->conn->prepare("SELECT * FROM state JOIN lga ON state.state_id = lga.state_id ORDER BY state_name ASC, lga_name ASC");
            $statement->execute();
            $result = $statement->get_result();

            $data = $result->fetch_all();

            return $data;
        }
        # end fetch State & LGA

        # begin static method demo
        public static function displayStateLga(){
            
        }
        # end static method demo
    }
    
?>