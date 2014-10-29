<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sistem Absensi Orion</title>
</head>

<body>
<form action="recap.php" method="post">
Event name: <input name="eventName" type="text" />
<p>
<input type="submit" value="View" />
</form>
</body>
</html>

<?php
$eventName = $_POST['eventName'];

// write the code to output MySQL table here
?>