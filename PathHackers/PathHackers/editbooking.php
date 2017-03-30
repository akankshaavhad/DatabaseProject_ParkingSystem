<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "parking";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
} 
if(isset($_GET['id']))
{
$id=$_GET['id'];

if(isset($_POST['btn-updatebooking']))
{
$startdate=$_POST['startdate'];
$enddate=$_POST['enddate'];
$query3=mysql_query("update parking.bookings set startdate='$startdate', enddate='$enddate' where id='$id'");
if (false === $query3) {
    echo mysql_error();
}
if($query3)
{
header('location:booking.php');
}
}
$query1=mysql_query("select * from parking.bookings where id=$id");
$query2=mysql_fetch_array($query1);
if (false === $query1) {
    echo mysql_error();
}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Coding Cage - Login & Registration System</title>
<link rel="stylesheet" href="stylesheets/style.css" type="text/css" />

</head>
<body>
<center>
<div id="login-form">
<form method="post">
<h1>Update the current booking </h1>
<table align="center" width="30%" border="0">
<tr>
<td><input type="text" name="startdate"  required value="<?php echo $query2['startdate']; ?>"/></td>
</tr>
<tr>
<td><input type="text" name="enddate" required value="<?php echo $query2['enddate']; ?>"/></td>
</tr>
<tr>
<td><button type="submit" name="btn-updatebooking">Update Booking</button></td>
</tr>
</table>
</form>
</div>
</center>
</body>
</html>