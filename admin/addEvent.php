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
      <td><input type="text" name="eventPassword"/></td>
    </tr>
  </table>
  <p>
  <input type="button" value="Create" />
</form>
</body>
</html>

<?php
$eventName = $_POST['eventName'];
// $eventPassword = $_POST['eventPassword'];

// write the code to create new SQL table here
?>