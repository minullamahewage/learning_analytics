<!DOCTYPE HTML>

<html>
	<head>
		<title>Learning Analytics</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta http-equiv="Content-Language" content="en">
		<link rel="stylesheet" href="../assets/css/main.css" />
		<noscript><link rel="stylesheet" href="../assets/css/noscript.css" /></noscript>
		<link rel="icon" href="../assets/graphics/app-icon.png">
        <link rel="stylesheet" href="../assets/css/card.css" />
		<link rel="icon" href="../assets/graphics/app-icon-transparent.png">
		
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

 if(substr($userid,-1)!=="T"){
    //echo "<script type='text/javascript'>alert('Login as a admin to complete this step.');</script>";
    header("location:../index.php");
}
		

?>


        <script>
  window.console = window.console || function(t) {};
</script>
<script>
  if (document.location.search.match(/type=embed/gi)) {
    window.parent.postMessage("resize", "*");
  }
</script>
<script src="chrome-extension://mooikfkahbdckldjjndioackbalphokd/assets/prompt.js"></script>


	</head>
	<body class="landing is-preload">

		<!-- Page Wrapper -->
			<div id="page-wrapper">

				<!-- Header -->
				
<div id="main-body">

</div>
					<header id="header" class="alt">
						<h1><a href="index.html">LearningAnalytics</a></h1>
						<nav id="nav">
							<ul>
								<li class="special">
									<a href="#menu" class="menuToggle"><span>Menu</span></a>
									<div id="menu">
										<ul>
											<li><a href="../index.php">Home</a></li>
											<li><a href="../User/registration.php">My Students</a></li>
											<li><a href="../User/login.php">My Attendace</a></li>
											<li><a href="../User/login.php">Login</a></li-->
											<li><a href="../Interface/about.html">Device List</a></li>

										</ul>
									</div>
								</li>
							</ul>
						</nav>
					</header>

				<!-- Banner -->
					
                    <section >

                    
                        <center>
                        <div class="inner">
						    <br>
						  <h2>Teacher Home</h2>
							<p>
                          <!-- <strong>Learning Analytics</strong> -->
                        </p>
                        <strong>Learning Analytics</strong> 
                        </center>
                    <div class="content">

                        <a class="card" href="view_student.php">
                        <div class="front" style="background-image: url(../assets/graphics/student.jpg);">
                        <p>My students</p>
                        </div>
                        <div class="back">
                        <div>
                        <!-- <p>Consectetur adipisicing elit. Possimus, praesentium?</p>
                        <p>Provident consectetur natus voluptatem quis tenetur sed beatae eius sint.</p> -->
                        <button class="button">View students</button>
                        </div>
                        </div></a><a class="card" href="teacher_attendance.php">
                        <div class="front" style="background-image: url(../assets/graphics/attendance.jpg);">
                        <p>My Attendance</p>
                        </div>
                        <div class="back">
                        <div>
                        <!-- <p>Consectetur adipisicing elit. Possimus, praesentium?</p>
                        <p>Provident consectetur natus voluptatem quis tenetur sed beatae eius sint.</p> -->
                        <button class="button">View Attendance</button>
                        </div>
                        </div></a><a class="card" href="course_view_teacher.php">
                        <div class="front" style="background-image: url(../assets/graphics/teachingmat.jpg);">
                        <p>My Courses</p>
                        </div>
                        <div class="back">
                        <div>
                        
                        <button class="button">View Courses</button>
                        </div>
                        </div></a><a class="card" href="../Interface/student_marks.php">
                        <div class="front" style="background-image: url(../assets/graphics/message.png);">
                        <p>Marks of Students</p>
                        </div>
                        <div class="back">
                        <div>
                        <!-- <p>Consectetur adipisicing elit. Possimus, praesentium?</p>
                        <p>Provident consectetur natus voluptatem quis tenetur sed beatae eius sint.</p> -->
                        <button class="button">Enter Marks</button>
                        </div>
                        </div></a>
                        <a class="card" href="../Interface/device_reg.php">
                        <div class="front" style="background-image: url(../assets/graphics/device.png);">
                        <p>Device details</p>
                        </div>
                        <div class="back">
                        <div>
                        <!-- <p>Consectetur adipisicing elit. Possimus, praesentium?</p>
                        <p>Provident consectetur natus voluptatem quis tenetur sed beatae eius sint.</p> -->
                        <button class="button">Update device details</button>
                        </div>
                        </div></a>
                        </div>
                    </section>
	
                    
  
		<!-- Scripts -->
			<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/jquery.scrollex.min.js"></script>
			<script src="../assets/js/jquery.scrolly.min.js"></script>
			<script src="../assets/js/browser.min.js"></script>
			<script src="../assets/js/breakpoints.min.js"></script>
			<script src="../assets/js/util.js"></script>
			<script src="../assets/js/main.js"></script>


	</body>
</html>