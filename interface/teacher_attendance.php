<?php 
session_start();
include "../Config/db_config.php";
$userid = $_SESSION['userid'];
$connection=mysqli_connect('localhost','root','','schooldatabase');

$query="SELECT date from teacher_attendance where tid='$userid' order by date desc";
$result= mysqli_query($connection,$query); 
$date="";
while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
	 $date=$date.$row['date']."<br>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../assets/css/style.css">
	
	<link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
	<link rel="icon"   href="../assets/graphics/app-icon.png">

	</head>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="" method="post" action="" name="login">
					<span class="login100-form-title p-b-26">
						My Attendance
					</span>
				
					<img src="../assets/graphics/app-icon.png" alt="login-logo" class="app-logo">
					<table >
						<tr>
                            <th>Date</th>
						</tr>
                        <tr >
                            <td><?php echo $date;?></td>
						</tr>
					</table>	
				</form>
			</div>
		</div>
	</div>
</body>
</html>
