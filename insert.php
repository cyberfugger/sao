<?php
// establish a connection with MySQL
$servername = "localhost";
$username = "awasist1_sao";
$password = "awas123";
$dbname = "awasist1_sao";
$conn = mysqli_connect($servername,$username,$password,$dbname);

// uppercase the input
$kodeabsen = strtoupper($_POST['kodeabsen']);

// MySQL data insertion code here

// close the connection
mysqli_close($conn);

// output some information then redirect
header('refresh: 5; url=index.html');
echo 'Absen ' . $kodeabsen . ' hadir' . '<p>';
echo 'Redirecting in 5 seconds ...';
?>