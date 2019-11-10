<?php
$studentID = filter_input(INPUT_POST, 'studentID');
$date = filter_input(INPUT_POST, 'date');
if (!empty($studentID)){
if (!empty($date)){
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "schooldatabase";
// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
if (mysqli_connect_error()){
die('Connect Error ('. mysqli_connect_errno() .') '
. mysqli_connect_error());
}
else{
	$var = $_POST['attendance'];
$sql = "INSERT INTO student_attendance (sid, date,status)
values ('$studentID','$date','$var')";
if ($conn->query($sql)){
//echo "New record is inserted sucessfully";
echo "<script type='text/javascript'>alert('New record is inserted sucessfully');</script>";
 echo "<script>location.href = 'markstudentattendance.php';</script>";

}
else{
echo "Error: ". $sql ."
". $conn->error;
}
$conn->close();
}
}
else{
echo "<script type='text/javascript'>alert('Date should not be empty');</script>";
echo "<script>location.href = 'markstudentattendance.php';</script>";
die();
}
}
else{
echo "<script type='text/javascript'>alert('Student ID should not be empty');</script>";
echo "<script>location.href = 'markstudentattendance.php';</script>";
die();
}
?>