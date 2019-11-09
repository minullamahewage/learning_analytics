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
		
	public function view_courses($sid){
		$sql=" SELECT courseid,coursename FROM courses NATURAL JOIN courselist WHERE sid='$sid'";
			// echo $sql;
		$result = mysqli_query($this->db,$sql) or die(mysqli_connect_errno()."Data cannot inserted");
		return $result;

	}

	public function veiw_results($sid){
		$sql="SELECT courseid,coursename,marks FROM results NATURAL JOIN courses WHERE sid='$sid'";
		$result = mysqli_query($this->db,$sql) or die(mysqli_connect_errno()."Data cannot inserted");
		return $result;
	}


	}
?>