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

if($userid!=="admin"){
    //echo "<script type='text/javascript'>alert('Login as a admin to complete this step.');</script>";
    header("location:../index.php");
}
?>

<!--Add code below this-->


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
											<li><a href="../index.html">Home</a></li>
											
											<li><a href="../User/login.php">Login</a></li>
                                            <li><a href="../User/registration.php">Add User</a></li>
                                            <li><a href="../Interface/register_course.php">Add Course</a></li>
                                            <li><a href="../User/login.php">Mark Attendance</a></li>
                                            <li><a href="../Interface/register_course_student.php">Add Students to Course</a></li>
											<!--li><a href="reviews.php">Reviews</a></li-->
											

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
						  <h2>Admin Control Panel</h2>
							<p>
                          <!-- <strong>Learning Analytics</strong> -->
                        </p>
                        <strong></strong> 
                        </center>
                    <div class="content">

                        <a class="card" href="../User/registration.php">
                        <div class="front" style="background-image: url(../assets/graphics/records.jpg);">
                        <p>Add User</p>
                        </div>
                        <div class="back">
                        <div>
                        <!-- <p>Consectetur adipisicing elit. Possimus, praesentium?</p>
                        <p>Provident consectetur natus voluptatem quis tenetur sed beatae eius sint.</p> -->
                        <button class="button">Add User</button>
                        </div>
                        </div></a>
                        <a class="card" href="../Interface/markstudentattendance.php">
                        <div class="front" style="background-image: url(../assets/graphics/attendance.jpg);">
                        <p>Mark Student Attendance</p>
                        </div>
                        <div class="back">
                        <div>
                        <!-- <p>Consectetur adipisicing elit. Possimus, praesentium?</p>
                        <p>Provident consectetur natus voluptatem quis tenetur sed beatae eius sint.</p> -->
                        <button class="button">Mark Attendance</button>
                        </div>
                        </div></a><a class="card" href="../Interface/register_course_student.php">
                        <div class="front" style="background-image: url(../assets/graphics/teachingmat.jpg);">
                        <p>Add Students to Course</p>
                        </div>
                        <div class="back">
                        <div>
                        
                        <button class="button">Add Students</button>
                        </div>
                        </div></a><a class="card" href="../Interface/register_course.php">
                        <div class="front" style="background-image: url(../assets/graphics/results.jpg);">
                        <p>Add New Course</p>
                        </div>
                        <div class="back">
                        <div>
                        <button class="button">Add Course</button>
                        </div>
                       
                        </div></a>
                        <a class="card" href="#">
                        <div class="front" style="background-image: url(../assets/graphics/device.png);">
                        <p>Device details</p>
                        </div>
                        <div class="back">
                        <div>
                        <!-- <p>Consectetur adipisicing elit. Possimus, praesentium?</p>
                        <p>Provident consectetur natus voluptatem quis tenetur sed beatae eius sint.</p> -->
                        <button class="button">View devices</button>
                        </div>
                        </div></a>
                        <a class="card" href="../Interface/markteacherattendance.php">
                        <div class="front" style="background-image: url(../assets/graphics/records.jpg);">
                        <p>Mark Teacher Attendance</p>
                        </div>
                        <div class="back">
                        <div>
                        <!-- <p>Consectetur adipisicing elit. Possimus, praesentium?</p>
                        <p>Provident consectetur natus voluptatem quis tenetur sed beatae eius sint.</p> -->
                        <button class="button">Mark Attendance</button>
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


