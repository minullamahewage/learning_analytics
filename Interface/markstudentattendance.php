<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Mark Student Attendance</title>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

	<link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
	<link rel="icon" href="../assets/graphics/app-icon-transparent.png">

	<link rel="stylesheet" href="../assets/css/style.css">

	<?php
	session_start();
	require '../User/class.user.php';
	
	$user = new User();
	$userid = $_SESSION['userid'];
	if (isset($_GET['q'])){
	 $user->user_logout();
	 header("location:../index.php");
	 }
	
	 if($userid!='admin'){
		header("location:../index.php");
	}

	require '../User/class.student.php';
	$student = new Student(); // Checking for user logged in or not
	if ( $_SERVER[ 'REQUEST_METHOD' ] === 'POST' ) {
		if ( isset( $_REQUEST[ 'submit' ] ) ) {
			extract( $_REQUEST );
			
			$register = $student->mark_attendance($sid, $date,$status);
			if ($register) {
                //header("location:../User/admin_console.php");
                $message="Attendance marked successfully";
                echo "<script type='text/javascript'>alert('$message');</script>";
			} else {
			// Registration Failed
				$message = "Failed. Marks for this subject already added.";
				echo "<script type='text/javascript'>alert('$message');</script>";

			}
		}
	}
	?>
</head>

<body id="registration">
	<script type="text/javascript" language="javascript">
		function submitreg() {
			//alert("hi");
			var form = document.register;
			if ( form.sid.value == "" ) {
				alert("Enter Teacher ID");
				return false;
			} else if ( form.date.value == "" ) {
				alert( "Enter Date" );
				return false;
			} else if ( form.status.value == "" ) {
				alert( "Mark Attendance" );
				return false;
			}
			
		}
		

	</script>

	<div class="container">
		<form class="" action="" method="post" name="register">
			<div class="row">
				<h4>Student Attendance</h4>
				<div class="input-group input-group-icon">
					<input type="text" placeholder="Student ID" id="nameID" name='sid'/>
					<div class="input-icon"><i class="fa fa-user"></i>
						<div id="fnamevalid" style="color:Red;display:none">
						</div>
					</div>
					
				</div>
				
				<div class="input-group input-group-icon">
					<input type="Date" placeholder="Date" id="emailID" name='date'/>
					<div class="input-icon"><i class="fa fa-book"></i>
					</div>
				</div>
				<div class="input-group input-group-icon">
                <select name="attendance",id="status">
                    <option value="Present">Present</option>
                    <option value="Absent">Absent</option>
                </select>
					<div class="input-icon"><!--i class="fa fa-book"></i-->
						<div id="fnamevalid" style="color:Red;display:none">
						</div>
					</div>
					
				</div>
			</div>
			<div class="row">
				<div class="row">
					<h4></h4>
					<div class="input-group">
						<input type="submit" name="submit" value="Submit" id="btn_submit" onclick="return(submitreg());"/>
						<label for="btn_submit"></label>

					</div>
				</div>
		</form>
		</div>
		




</body>

</html>