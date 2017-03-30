<html>
<body>
<?php
include('config.php');
if(isset($_GET['id']))
{
$id=$_GET['id'];
$query1=mysql_query("delete from parking.bookings where id='$id'");
if($query1)
{
	?>
	<script>alert("Successfully deleted");</script>
	<?php
header('location:booking.php');
}
}
?>
</body>
</html>