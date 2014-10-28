<?php
  // establish a connection with MySQL
  $servername = "localhost";
  $username = "awasist1_sao";
  $password = "awas123";
  $dbname = "awasist1_sao";
  $conn = mysqli_connect($servername,$username,$password,$dbname);
  
  // uppercase the input
  $kodeabsen = strtoupper($_POST['kodeabsen']);
  
  // check whether someone has attended the event
  $result = mysqli_query($conn,"SELECT * FROM EventAttandance WHERE student_code = $kodeabsen");
  
  // if someone has attended the event
  if ( $row = mysqli_fetch_array($result) ) {
    header('refresh: 5; url=index.html');
    echo 'Absen ' . $kodeabsen . ' sudah hadir jam ' .  $row['timestamp'] . '<p>';
    echo 'Redirecting in 5 seconds ...';
  } else {
    
    // add new record to table
    $time_attended = date("Y-m-d H:i:s");
    $sql = "INSERT INTO EventAttandance (timestamp, student_code) VALUES ($kodeabsen, $time_attended);";
    
    if ($conn->query($sql) === TRUE) {
      header('refresh: 5; url=index.html');
      echo 'Absen ' . $kodeabsen . ' hadir' . '<p>';
      echo 'Redirecting in 5 seconds ...';
    } else {
      echo 'add record error';
    }
    
  }
  // output some information then redirect
  
  
  // close the connection
  mysqli_close($conn);
?>
