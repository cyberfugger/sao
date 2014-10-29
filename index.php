<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sistem Absensi Orion</title>
</head>

<body>
    <h1>Sistem Absensi Orion</h1>

    <p>by Alva Thomson & Andika Wasisto</p>
    
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        Kode Absen: <input type="text" name="kodeabsen" />
        <p>
        <input type="submit" value="Attend" />
    </form>
</body>
</html>

<?php

  // establish a connection with MySQL

	if (isset($_POST['kodeabsen'])) {
		
		$servername = "localhost";
		$username = "awasist1";
		$password = "awas123";
		$dbname = "awasist1_sao";

		$conn = new mysqli($servername,$username,$password,$dbname);
		
		// kodeabsen to uppercase
		$kodeabsen = strtoupper($_POST['kodeabsen']);
	
		$sql = "CREATE TABLE EventAttendance (
					id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
					student_code VARCHAR(30) NOT NULL,
					timestamp TIMESTAMP
				)";
				
		$conn->query($sql);

		if ($kodeabsen === "" ) {
			header('refresh: 2; url=index.php');
			echo 'Input tidak boleh kosong!' . '<p>';
			echo 'Redirecting in 2 seconds ...';
	  } else {
		// check whether someone has attended the event
		$result = mysqli_query($conn,"SELECT * FROM EventAttendance WHERE student_code='$kodeabsen'");
		if ($row = mysqli_fetch_array($result)) {        
			header('refresh: 2; url=index.php');
			echo 'Absen ' . $kodeabsen . ' sudah hadir dari ' . $row['timestamp'] . '<p>';
			echo 'tidak berhasil memasukkan data' . '<p>'; 
			echo 'Redirecting in 2 seconds ...';
		} else {
		// add new record to table
			$sql = "INSERT INTO EventAttendance (student_code) VALUES ('$kodeabsen')";
			if ($conn->query($sql) === TRUE) {
				 header('refresh: 2; url=index.php');
				echo 'Absen ' . $kodeabsen . ' hadir' . '<p>';
				echo 'Redirecting in 2 seconds ...';
			} else {
				echo 'add record error';
			}
		}
	  }
	  
	  $conn->close();
	} else echo 'input Kode Absen';
 
?>


