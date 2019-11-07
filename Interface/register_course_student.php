<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Register Student to Course</title>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

	<link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
	<link rel="icon" href="../assets/graphics/app-icon-transparent.png">

	<link rel="stylesheet" href="../assets/css/style.css">

	<?php
    session_start();
    require '../User/class.user.php';
    
    $user = new User();
    $userid = $_SESSION['userid'];
    
    
    
    /*if (!$user->get_session()){
     header("location:../User/login.php");
    }*/
    
    if (isset($_GET['q'])){
     $user->user_logout();
     header("location:../index.php");
     }
    
    if($userid!=="admin"){
        //echo "<script type='text/javascript'>alert('Login as a admin to complete this step.');</script>";
        header("location:../index.php");
    }

	require '../User/class.student.php';
	$student = new Student(); // Checking for user logged in or not
	if ( $_SERVER[ 'REQUEST_METHOD' ] === 'POST' ) {
		if ( isset( $_REQUEST[ 'submit' ] ) ) {
			extract( $_REQUEST );
			//echo "afsdfasgag";
			
				//echo "You have selected :" . $_REQUEST['udob']; //  Displaying Selected Value
			
			$register = $student->reg_course($courseid, $sid);
			if ($register) {
			// Registration Success
			//echo 'Registration successful <a href="login.php">Click here</a> to login';
				header("location:../Interface/admin_console.php");
			} else {
			// Registration Failed
				$message = "Registration failed. This entry has already been added.\\nTry again.";
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
			if ( form.courseid.value == "" ) {
				alert("Enter Course ID");
				return false;
			} else if ( form.sid.value == "" ) {
				alert( "Enter Student ID" );
				return false;
			} 
			
		}
		
	</script>

	<div class="container">
		<form class="" action="" method="post" name="register">
			<div class="row">
				<h4>Register Student to Course</h4>
				<div class="input-group input-group-icon">
					<input type="text" placeholder="Course ID" id="nameID" name='courseid'/>
					<div class="input-icon"><i class="fa fa-book"></i>
						<div id="fnamevalid" style="color:Red;display:none">
						</div>
					</div>					
				</div>
				<div class="input-group input-group-icon">
					<input type="text" placeholder="Student ID" id="emailID" name='sid'/>
					<div class="input-icon"><i class="fa fa-user"></i>
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
					<!--a href="login.php">Already registered! Click Here!</a>
					</td>
					<div class="row">
						<a href="../Interface/privacy.html" target="_blank">
							<p id="privacy">Terms and Conditions/Privacy Policies</p>


					</div-->
				</div>
		</form>
		</div>
		




</body>

</html>