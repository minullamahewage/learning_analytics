<?php

//load.php
session_start();
include "../Config/db_config.php";
$userid = $_SESSION['userid'];
$connect = new PDO('mysql:host=localhost;dbname=schooldatabase', 'root', '');
$data=array();
$query = "SELECT * FROM student_attendance WHERE sid='$userid'";
$statement = $connect->prepare($query);
$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $data[] = array(
  'sid'   => $row["sid"],
  'title'   => $row["status"],
  'date'   => $row["date"]
 );
}

echo json_encode($data);

?>
