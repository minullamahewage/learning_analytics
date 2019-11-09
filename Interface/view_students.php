<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>View students</title>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

	<link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
	<link rel="icon" href="../assets/graphics/app-icon-transparent.png">

	<link rel="stylesheet" href="../assets/css/style.css">

	
</head>

<body id="viewstudents">
	
  <?php
  
  	session_start();
  //   require '../User/class.teacher.php';
	require '../User/class.user.php';
	  
	  $user = new User();
	  $userid = $_SESSION['userid'];
	  
	
	require '../User/class.teacher.php';
	$teacher=new Teacher();
	$result=$teacher->view_students($userid);
	// echo $results[0];
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {

			// echo "id: " . $row["courseid"]. " - Name: " . $row["coursename"]. "<br>";
			// ,sid,coursename
			echo " <div class='container'><div class='row'> <h4>Student name : " . $row["sname"] . " </h4>";
			echo "<p>sid : " . $row["sid"] . "	<p>";
			echo "<p>coursename : " . $row["coursename"] . "<p>";
			echo "</div></div><br>";
		}
	} else {
		echo "0 results";
	}

  
  ?>

</body>

</html>