<?php 
    // include

    include_once("constants.php");

    // class definition
    class School{
        // member variables
        public $school_name;
        public $school_type;
        public $school_section;
        public $state;
        public $lga;
        public $school_address;
        public $school_email;
        public $school_phoneno;
        public $school_password;
        public $school_description;
        public $total_student;
        public $conn; // database connection handler

        // member functions
        public function __construct(){
            // open connection by creating mysqli object
            $this->conn = new Mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASENAME);

            //  check if connected
            if ($this->conn->connect_error) {
                die("Connection Failed: ".$this->conn->connect_error);
            }else{
                echo "connection successful";
            }
        }

        # insertSchool method begins here
        public function insertSchool($sch_type,$sch_section, $sch_name, $state, $lga, $sch_address, $sch_email, $sch_phoneno, $pswd, $sch_desc, $total_student){
            // insert school in database
            $stmt = $this->conn->prepare ("INSERT INTO school(student_type,school_section,school_name,state,lga,school_address,school_email,school_phoneno,school_password,school_description,total_student) VALUES(?,?,?,?,?,?,?,?,?,?,?)");

           

            // bind the parameter

            $stmt->bind_param("ssssssssssi", $sch_type,$sch_section, $sch_name, $state, $lga, $sch_address, $sch_email, $sch_phoneno, $pswd, $sch_desc, $total_student);

            // execute

            $stmt->execute();

            // check if record was inserted

            if ($stmt->error) {
                return "Oops, something happened! ".$stmt->error;
            }else{
                return "Registration successfully inserted";
            }
        }
        # insertSchool method stop here


         # insertSchooladmin method begins here
        public function insertSchooladmin($fname, $lname, $emailaddress, $address, $phoneno, $password,){
            // insert school in database
            $stmt = $this->conn->prepare ("INSERT INTO admin(firstname, lastname, emailaddress, address, phonenumber, password) VALUES (?,?,?,?,?,?)");

            // encrpt password

            $password = password_hash($password, PASSWORD_DEFAULT);

            // bind the parameter

            $stmt->bind_param("ssssss", $fname, $lname, $emailaddress, $address, $phoneno, $password);

            // execute

            $stmt->execute();

            // check if record was inserted

            if ($stmt->error) {
                echo "Oops, something happened! ".$stmt->error;
            }else{
                return "Registration successfully ok";
            }
        }
        # insertSchooladmin method stop here



        # begin getSchool
        function getSchool_name($sch_name){
            // retrive school by schoolname
            $stmt = $this->conn->prepare("SELECT * FROM school WHERE school_name= ? LIMIT ?");

            // bind the parameter
            $limit = 1;
            $stmt->bind_param("si", $sch_name, $limit);

            // execute

            $stmt->execute();

            // get result
            $result = $stmt->get_result();

            //$record = array();
            //$record[]; - Empty Array

            if ($result->num_rows == 1) {
                return $result->fetch_array(); 
            }else{
                return "No School found!";
            }
        }
        # end getSchool

               # begin login
                function login($email, $password){
                    // prepare the statement
                    $stmt = $this->conn->prepare("SELECT * FROM school WHERE school_email=?");
                    // encrpt password

           

            // bind the parameter

            $stmt->bind_param("s", $email);

            // execute

            $stmt->execute();

            // get  was inserted
            $result = $stmt->get_result();

            if ($result->num_rows==1) {
                
                $row = $result->fetch_assoc();

                

                 if (password_verify($password, $row['school_password'])) {
                     
                     return true;
                 }
                }else{ 

                    //password doesnot match
                    return false;
                 }
            

            
        }
        
        #end login


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




        # begin fetch all school
        function listSchool(){
            // prepare the statement
            $stmt = $this->conn->prepare("SELECT * FROM school");

            $stmt->execute();

            // get result

            $result = $stmt->get_result();

            $records = array();

            if ($result->num_rows > 0) {
                // loop through te result set to fetch all records
                while ($row = $result->fetch_assoc()) {
                    $records[] = $row;
                }
            }

            return $records;
        }
        # end fetch all shcool

         
    }
?>