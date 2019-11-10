<!DOCTYPE html>
<html>
<head>
<title>Teacher Attendence</title>
</head>
<body>
<form method="post" action="tprocess.php">
Teacher ID: <input type="text" name="teacherID" required="required"><br><br>
Date: <input type="Date" name="date" required="required"><br><br>
<p>
        <label for="attendance">Attendance:</label>
        <select name="attendance">
        <option value="Present">Present</option>
        <option value="Absent">Absent</option>
        </select>
    </p>

<input type="submit" value="Submit">
</form>
</body>
</html>
