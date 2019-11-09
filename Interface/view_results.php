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
	  
	
	require '../User/class.student.php';
	$student=new Student();
	$result=$student->veiw_results($userid);
	// echo $results[0];
	if ($result->num_rows > 0) {
        // output data of each row
        
        echo " <div class='container'><table class='responsive-table'><thead><tr><th scope='col'>Course ID</th><th scope='col'>Course name</th><th scope='col'>Marks</th></tr></thead><tbody>";
		while($row = $result->fetch_assoc()) {

			// echo "id: " . $row["courseid"]. " - Name: " . $row["coursename"]. "<br>";
            echo "<tr><td data-title='courseid'>";
            echo $row["courseid"] ."</td><td data-title='coursename'>" . $row["coursename"] ."</td><td data-title='marks'>" . $row["marks"] ."</td></tr>" ;

                
			// echo " <div class='container'><div class='row'> <h4>Course name : " . $row["coursename"] . " </h4>";
            // echo "<h4>Course id : " . $row["courseid"] . "</h4>";
            // echo "<h4>Marks : " . $row["marks"] . "</h4>";
			// echo "</div></div><br>";
        }
        echo "</tbody></table></div>";
	} else {
		echo "0 results";
	}

  
  ?>

</body>

</html>