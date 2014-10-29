<title>Sistem Absensi Orion</title>
<?php
  // establish a connection with MySQL
  $servername = "localhost";
  $username = "awasist1_sao";
  $password = "awas123";
  $dbname = "awasist1_sao";
  $conn = new mysqli($servername,$username,$password,$dbname);
  
  // kodeabsen to uppercase
  $kodeabsen = strtoupper($_POST['kodeabsen']);
		
	if ($kodeabsen === "" ) {
		header('refresh: 2; url=index.html');
		echo 'Input tidak boleh kosong!' . '<p>';
		echo 'Redirecting in 2 seconds ...';
  } else {
  	// check whether someone has attended the event
  	$result = mysqli_query($conn,"SELECT * FROM EventAttendance WHERE student_code='$kodeabsen'");
  	
  	if ($row = mysqli_fetch_array($result)) {        
  		header('refresh: 2; url=index.html');
  		echo 'Absen ' . $kodeabsen . ' sudah hadir dari ' . $row['timestamp'] . '<p>';
  		echo 'tidak berhasil memasukkan data' . '<p>'; 
  		echo 'Redirecting in 2 seconds ...';
  	} else {
  	// add new record to table
    	$sql = "INSERT INTO EventAttendance (student_code) VALUES ('$kodeabsen')";
    	
    	if ($conn->query($sql) === TRUE) {
    		header('refresh: 2; url=index.html');
    		echo 'Absen ' . $kodeabsen . ' hadir' . '<p>';
    		echo 'Redirecting in 2 seconds ...';
    	} else {
    		echo 'add record error';
    	}
    }
  }

  // close the connection
  $conn->close();
?>
