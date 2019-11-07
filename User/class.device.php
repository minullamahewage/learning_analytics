<?php

	class Device{

		public $db;

		public function __construct(){
			$this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

			if(mysqli_connect_errno()) {
				echo "Error: Could not connect to database.";
			        exit;
			}
		}

		/*** for device addition ***/
		public function reg_device($deviceid,$userid,$devicename){

			//$upass = md5($upass);
			$sql="SELECT * FROM devices WHERE deviceid='$deviceid' ";

			//checking if the username or email is available in db
			$check =  $this->db->query($sql) ;
			$count_row = $check->num_rows;

			//if the username is not in db then insert to the table
			if ($count_row == 0){
				$sql1="INSERT INTO devices SET deviceid='$deviceid', userid='$userid', devicename='$devicename' ";
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
		
        
        /* Delete device */
        public function remove_device($deviceid){
			$sql="SELECT * FROM devices WHERE deviceid='$deviceid' ";

			//checking if the device is available in db
			$check =  $this->db->query($sql) ;
			$count_row = $check->num_rows;

			//if the device is in db then delete from table
			if ($count_row == 1){
				$sql1="DELETE FROM devices WHERE deviceid='$deviceid' ";
				$result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
        		return $result;
			}
			else { return false;}
		}


	}
?>