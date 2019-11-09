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
		<link rel="icon" href="../assets/graphics/app-icon.png">
		
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

if(substr($userid,-1)!=="S"){
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
                                            <li><a href="../User/login.php">My Record</a></li>
                                            <li><a href="../User/student_attendance.php">My Attendance</a></li>
                                            <li><a href="../User/login.php">My Results</a></li>
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
						  <h2>Student Home</h2>
							<p>
                          <!-- <strong>Learning Analytics</strong> -->
                        </p>
                        <strong>School Management System</strong> 
                        </center>
                    <div class="content">

                        <a class="card" href="#">
                        <div class="front" style="background-image: url(../assets/graphics/records.jpg);">
                        <p>My records</p>
                        </div>
                        <div class="back">
                        <div>
                        <!-- <p>Consectetur adipisicing elit. Possimus, praesentium?</p>
                        <p>Provident consectetur natus voluptatem quis tenetur sed beatae eius sint.</p> -->
                        <button class="button">View records</button>
                        </div>
                        </div></a><a class="card" href="student_attendance.php">
                        <div class="front" style="background-image: url(../assets/graphics/attendance.jpg);">
                        <p>My Attendance</p>
                        </div>
                        <div class="back">
                        <div>
                        <!-- <p>Consectetur adipisicing elit. Possimus, praesentium?</p>
                        <p>Provident consectetur natus voluptatem quis tenetur sed beatae eius sint.</p> -->
                        <button class="button">View Attendance</button>
                        </div>
<<<<<<< HEAD
                        </div></a><a class="card" href="course_view_student.php">
=======
                        </div></a><a class="card" href="view_course_student.php">
>>>>>>> 62aa8c8fe2b7cb8812f12c48e4534a7206c9a851
                        <div class="front" style="background-image: url(../assets/graphics/teachingmat.jpg);">
                        <p>View Courses</p>
                        </div>
                        <div class="back">
                        <div>
                        
                        <button class="button">View Courses</button>
                        </div>
<<<<<<< HEAD
                        </div></a><a class="card" href="student_result.php">
=======
                        </div></a><a class="card" href="view_results.php">
>>>>>>> 62aa8c8fe2b7cb8812f12c48e4534a7206c9a851
                        <div class="front" style="background-image: url(../assets/graphics/results.jpg);">
                        <p>My results</p>
                        </div>
                        <div class="back">
                        <div>
                        <button class="button">View my results</button>
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


