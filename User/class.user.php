<?php
include "../Config/db_config.php";

	class User{

		public $db;

		public function __construct(){
			$this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

			if(mysqli_connect_errno()) {
				echo "Error: Could not connect to database.";
			        exit;
			}
		}

		/*** for registration process ***/
		public function reg_user($userid,$uname,$upass,$utype){

			$upass = md5($upass);
			$sql="SELECT * FROM users WHERE userid='$userid' ";

			//checking if the username or email is available in db
			$check =  $this->db->query($sql) ;
			$count_row = $check->num_rows;

			//if the username is not in db then insert to the table
			if ($count_row == 0){
				$sql1="INSERT INTO users SET userid='$userid', uname='$uname', upass='$upass', utype='$utype' ";
				$result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot be inserted user");
        		return $result;
			}
			else { return false;}
		}
		/*** for login process ***/
		public function check_login($userid, $upass){
			//echo $upass;
			//echo $uemail;
        	$upass = md5($upass);
			
			$sql2="SELECT * from users WHERE userid='$userid' and upass='$upass'";

			//checking if the username is available in the table
        	$result = mysqli_query($this->db,$sql2);
        	$user_data = mysqli_fetch_array($result);
        	$count_row = $result->num_rows;

	        if ($count_row == 1) {
	            // this login var will use for the session thing
	            $_SESSION['login'] = true;
				$_SESSION['userid'] = $user_data['userid'];
				//$_SESSION['uname'] = $user_data['uname'];
	            return true;
	        }
	        else{
			    return false;
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
		public function reg_student($userid,$uname){

			//$upass = md5($upass);
			$sql="SELECT * FROM students WHERE sid='$userid' ";

			//checking if the username or email is available in db
			$check =  $this->db->query($sql) ;
			$count_row = $check->num_rows;

			//if the username is not in db then insert to the table
			if ($count_row == 0){
				$sql1="INSERT INTO students SET sid='$userid', sname='$uname' ";
				$result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot be inserted student");
        		return $result;
			}
			else { return false;}
		}
		
		/*** Adding user to student ***/
		public function reg_teacher($userid,$uname){

			//$upass = md5($upass);
			$sql="SELECT * FROM teachers WHERE tid='$userid' ";

			//checking if the username or email is available in db
			$check =  $this->db->query($sql) ;
			$count_row = $check->num_rows;

			//if the username is not in db then insert to the table
			if ($count_row == 0){
				$sql1="INSERT INTO teachers SET tid='$userid', tname='$uname' ";
				$result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
        		return $result;
			}
			else { return false;}
		}
		/*** Adding device to user ***/
		public function reg_device($deviceid,$userid,$devicename){

			//$upass = md5($upass);
			$sql="SELECT * FROM devices WHERE deviceid='$deviceid' ";

			//checking if device is available in db
			$check =  $this->db->query($sql) ;
			$count_row = $check->num_rows;

			//if the device is not in db then insert to the table
			if ($count_row == 0){
				$sql1="INSERT INTO devices SET deviceid='$deviceid', userid='$userid', devicename='$devicename' ";
				$result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
        		return $result;
			}
			else { return false;}
		}



	}
?>