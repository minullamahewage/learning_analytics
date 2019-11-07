<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Register Course</title>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

	<link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
	<link rel="icon" href="../assets/graphics/app-icon-white.png">

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

    require '../User/class.course.php';
	$course = new Course(); // Checking for user logged in or not
	if ( $_SERVER[ 'REQUEST_METHOD' ] === 'POST' ) {
		if ( isset( $_REQUEST[ 'submit' ] ) ) {
			extract( $_REQUEST );
			//echo "afsdfasgag";
			
				//echo "You have selected :" . $_REQUEST['udob']; //  Displaying Selected Value
			
			$register = $course->reg_course($courseid, $coursename, $teacherid);
			if ($register) {
			// Registration Success
			//echo 'Registration successful <a href="login.php">Click here</a> to login';
				header("location:../Interface/admin_console.php");
			} else {
			// Registration Failed
				$message = "Registration failed. Course already exist please try again.\\nTry again.";
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
			} else if ( form.coursename.value == "" ) {
				alert( "Enter Course Name" );
				return false;
			} else if ( form.teacherid.value == "" ) {
				alert( "Enter Teacher ID." );
				return false;
			} 
			
		}

}
	</script>

	<div class="container">
		<form class="" action="" method="post" name="register">
			<div class="row">
				<h4>Course Details</h4>
				<div class="input-group input-group-icon">
					<input type="text" placeholder="Course ID" id="nameID" name='courseid'/>
					<div class="input-icon"><i class="fa fa-book"></i>
						<div id="fnamevalid" style="color:Red;display:none">
						</div>
					</div>
					
				</div>
				
				<div class="input-group input-group-icon">
					<input type="text" placeholder="Course Name" id="emailID" name='coursename'/>
					<div class="input-icon"><i class="fa fa-book"></i>
					</div>
				</div>
				<div class="input-group input-group-icon">
					<input type="text" placeholder="Teacher ID" id="nameID" name='teacherid'/>
					<div class="input-icon"><i class="fa fa-user"></i>
						<div id="fnamevalid" style="color:Red;display:none">
						</div>
					</div>
					
				</div>
			</div>
			
			<!--div class="row">
				<div class="col-half">
					<h4>Date of Birth</h4>
					<div class="input-group">

						<div class="col-third">
							<input type="date"  name="udob" id = "date"/>
						</div>
					</div>
				</div>
				<div class="col-half">
					<h4>Gender</h4>
					<div class="input-group">
						<input type="radio" name="ugender" value="male" id="gender-male"/>
						<label for="gender-male">Male</label>
						<input type="radio" name="ugender" value="female" id="gender-female"/>
						<label for="gender-female">Female</label>
					</div>
				</div>
			</div-->

			<div class="row">
				<!--h4>Terms and Conditions</h4>
				<div class="input-group">
					<input type="checkbox" id="terms" name="terms"/>
					<label for="terms">I accept the terms and conditions for signing up to this service, and hereby confirm I have read the privacy policy.</label>
				</div-->
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