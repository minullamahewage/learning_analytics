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
		/*** for login process ***/
		public function check_course($courseid,$coursename){
			//echo $upass;
			//echo $uemail;
        	//$upass = md5($upass);
			
			$sql2="SELECT * from courses WHERE courseid='$courseid' and coursename='$coursename'";

			//checking if the username is available in the table
        	$result = mysqli_query($this->db,$sql2);
        	$course_data = mysqli_fetch_array($result);
        	$count_row = $result->num_rows;

	        if ($count_row == 1) {
	            // this login var will use for the session thing
	            $_SESSION['login'] = true;
				$_SESSION['courseid'] = $course_data['courseid'];
				//$_SESSION['uname'] = $user_data['uname'];
	            return true;
	        }
	        else{
			    return false;
			}
    	}

    	/*** for showing the username or fullname ***/
    	public function get_fullname($userid){
    		$sql3="SELECT uname FROM users WHERE userid = '$userid'";
	        $result = mysqli_query($this->db,$sql3);
			$user_data = mysqli_fetch_array($result);
			
	        return $user_data['uname'];
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