<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Add Device</title>

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
	if ( $_SERVER[ 'REQUEST_METHOD' ] === 'POST' ) {
		if ( isset( $_REQUEST[ 'submit' ] ) ) {
			extract( $_REQUEST );
			
			$register = $user->reg_device($deviceid, $userid,$devicename);
			if ($register) {
                //header("location:../User/admin_console.php");
                $message="Device added successfully";
                echo "<script type='text/javascript'>alert('$message');</script>";
			} else {
			// Registration Failed
				$message = "Failed. Device already added.";
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
			if ( form.deviceid.value == "" ) {
				alert("Enter Device ID");
				return false;
			} else if ( form.marks.value == "" ) {
				alert( "Enter Marks" );
				return false;
			}
			
		}
		

	</script>

	<div class="container">
		<form class="" action="" method="post" name="register">
			<div class="row">
				<h4>Device details</h4>
				<div class="input-group input-group-icon">
					<input type="text" placeholder="Device ID" id="nameID" name='deviceid'/>
					<div class="input-icon"><i class="fa fa-user"></i>
						<div id="fnamevalid" style="color:Red;display:none">
						</div>
					</div>
					
				</div>
				<div class="input-group input-group-icon">
					<input type="text" placeholder="Device Name" id="emailID" name='devicename'/>
					<div class="input-icon"><i class="fa fa-book"></i>
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