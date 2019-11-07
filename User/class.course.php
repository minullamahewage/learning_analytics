<?php

	class Course{

		public $db;

		public function __construct(){
			$this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

			if(mysqli_connect_errno()) {
				echo "Error: Could not connect to database.";
			        exit;
			}
		}

		/*** for course registration process ***/
		public function reg_course($courseid,$coursename,$teacherid){
			$sql="SELECT * FROM courses WHERE courseid='$courseid' ";

			//checking if the username or email is available in db
			$check =  $this->db->query($sql) ;
			$count_row = $check->num_rows;

			//if the username is not in db then insert to the table
			if ($count_row == 0){
				$sql1="INSERT INTO courses SET courseid='$courseid', coursename='$coursename', teacherid='$teacherid' ";
				$result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
        		return $result;
			}
			else { return false;}
		}

    	/*** starting the session ***/
	    public function get_session(){
	        return $_SESSION['login'];
	    }

	    public function user_logout() {
	        $_SESSION['login'] = FALSE;
	        session_destroy();
		}
		
        
        /* Remove course */
        public function remove_course($courseid){
			$sql="SELECT * FROM courses WHERE courseid='$courseid' ";

			//checking if the course is available in db
			$check =  $this->db->query($sql) ;
			$count_row = $check->num_rows;

			//if the course is in db then delete from table
			if ($count_row == 1){
                $sql1="DELETE FROM courses WHERE courseid='$courseid' ";
                $sql2="DELETE FROM courselist WHERE courseid='$courseid' ";
                $result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot deleted courses");
                $result2 = mysqli_query($this->db,$sql2) or die(mysqli_connect_errno()."Data cannot be deleted courselist");
                return $result;
                return $result2;
			}
			else { return false;}
		}


	}
?>