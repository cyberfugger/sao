<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sistem Absensi Orion</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table>
    <tr>
      <td>Event Name: </td>
      <td><input type="text" name="eventName" /></td>
    </tr>
    <tr>
      <td>Event Password:</td>
      <td><input type="password" name="eventPassword"/></td>
    </tr>
  </table>
  <p>
  <input type="submit" value="Create" />
</form>
</body>
</html>

<?php
	if (isset($_POST['eventPassword']) & isset($_POST['eventName']) ) {
		$eventName = $_POST['eventName'];
		$eventPassword = $_POST['eventPassword'];
		
		$servername = "localhost";
		$username = "awasist1";
		$password = "awas123";
		$dbname = "awasist1_sao";

		$conn = new mysqli($servername,$username,$password,$dbname);
		
		$sql = "CREATE TABLE Events (
					id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
					eventName VARCHAR(30) NOT NULL,
					eventPassword VARCHAR(30) NOT NULL
				)";
				
		$conn->query($sql);
		
		$result = mysqli_query($conn,"SELECT * FROM Events WHERE eventName='$eventName'");
		if ($row = mysqli_fetch_array($result)) {        
			header('refresh: 2; url=addEvent.php');
			echo $eventName . ' sudah ada <p>';
			echo 'tidak berhasil memasukkan data' . '<p>'; 
			echo 'Redirecting in 2 seconds ...';
		} else {
			$sql = "INSERT INTO Events (eventName, eventPassword) 
					VALUES ('$eventName','$eventPassword')";
			
			if ($conn->query($sql) === TRUE) {
				 header('refresh: 2; url=addEvent.php');
				echo 'Acara ' . $eventName . ' telah dibuat <p>';
				echo 'Redirecting in 2 seconds ...';
			} else {
				echo 'add record error';
			}
		} 
		
		$conn->close();
	} else echo 'Please input Event Name and Event Password';
		
?>
