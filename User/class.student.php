<?php

	class Student{

		public $db;

		public function __construct(){
			$this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

			if(mysqli_connect_errno()) {
				echo "Error: Could not connect to database.";
			        exit;
			}
		}
    	/*** starting the session ***/
	    public function get_session(){
	        return $_SESSION['login'];
	    }

	    public function user_logout() {
	        $_SESSION['login'] = FALSE;
	        session_destroy();
		}
		
		/*** Adding user to student ***/
		public function reg_course($courseid,$sid){

			//$upass = md5($upass);
			$sql="SELECT * FROM courselist WHERE sid='$sid' ";

			//checking if the username or email is available in db
			$check =  $this->db->query($sql) ;
			$count_row = $check->num_rows;

			//if the username is not in db then insert to the table
			if ($count_row == 0){
				$sql1="INSERT INTO courselist SET sid='$sid', courseid='$courseid' ";
				$result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
        		return $result;
			}
			else { return false;}
		}
        
        /* Add marks of students */
        public function add_marks($sid,$courseid,$marks){

			//$upass = md5($upass);
			$sql="SELECT * FROM results WHERE sid='$sid' ";

			//checking if the username or email is available in db
			$check =  $this->db->query($sql) ;
			$count_row = $check->num_rows;

			//if the username is not in db then insert to the table
			if ($count_row == 0){
				$sql1="INSERT INTO results SET sid='$sid', courseid='$courseid', marks='$marks' ";
				$result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
        		return $result;
			}
			else { return false;}
        }
        
        /* Remove course */
        public function remove_student($sid){
			$sql="SELECT * FROM students WHERE sid='$sid' ";

			//checking if the course is available in db
			$check =  $this->db->query($sql) ;
			$count_row = $check->num_rows;

			//if the course is in db then delete from table
			if ($count_row == 1){
                $sql1="DELETE FROM students WHERE sid='$sid' ";
                $sql2="DELETE FROM users WHERE userid='$sid' ";
                $sql3="DELETE FROM courselist WHERE sid='$sid' ";
                $sql4="DELETE FROM results WHERE sid='$sid' ";
                $sql5="DELETE FROM student_atendance WHERE sid='$sid' ";
                $result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot deleted students");
                $result2 = mysqli_query($this->db,$sql2) or die(mysqli_connect_errno()."Data cannot be deleted users");
                $result3 = mysqli_query($this->db,$sql3) or die(mysqli_connect_errno()."Data cannot be deleted courselist");
                $result4 = mysqli_query($this->db,$sql4) or die(mysqli_connect_errno()."Data cannot be deleted results");
                $result5 = mysqli_query($this->db,$sql5) or die(mysqli_connect_errno()."Data cannot be deleted student_atendance");
                return $result;
                return $result2;
                return $result3;
                return $result4;
                return $result5;
			}
			else { return false;}
		}


	}
?>