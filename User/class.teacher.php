<?php

	class Teacher{

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
			$sql="SELECT * FROM students WHERE sid='$sid' ";

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
		
		public function view_courses($tid){
			$sql=" SELECT courseid,coursename FROM courses WHERE teacherid='$tid'";
			$result = mysqli_query($this->db,$sql) or die(mysqli_connect_errno()."Data cannot inserted");
        	return $result;
		}

		public function view_students($tid){
			$sql=" SELECT sname,sid,coursename FROM courses NATURAL JOIN courselist NATURAL JOIN students WHERE teacherid='$tid'";
			// echo $sql;
			$result = mysqli_query($this->db,$sql) or die(mysqli_connect_errno()."Data cannot inserted");
        	return $result;
		}
        /* Remove course */
        public function remove_teacher($tid){
			$sql="SELECT * FROM students WHERE tid='$tid' ";

			//checking if the course is available in db
			$check =  $this->db->query($sql) ;
			$count_row = $check->num_rows;

			//if the course is in db then delete from table
			if ($count_row == 1){
                $sql1="DELETE FROM teachers WHERE tid='$tid' ";
                $sql2="DELETE FROM users WHERE userid='$tid' ";
                $sql3="DELETE FROM courses WHERE teacherid='$tid' ";
                $sql4="DELETE FROM devices WHERE userid='$tid' ";
                $sql5="DELETE FROM teacher_atendance WHERE tid='$sid' ";
                $result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot deleted teachers");
                $result2 = mysqli_query($this->db,$sql2) or die(mysqli_connect_errno()."Data cannot be deleted users");
                $result3 = mysqli_query($this->db,$sql3) or die(mysqli_connect_errno()."Data cannot be deleted courses");
                $result4 = mysqli_query($this->db,$sql4) or die(mysqli_connect_errno()."Data cannot be deleted devices");
                $result5 = mysqli_query($this->db,$sql5) or die(mysqli_connect_errno()."Data cannot be deleted teacher_atendance");
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