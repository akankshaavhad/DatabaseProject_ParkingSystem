<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script language="javascript" type="text/javascript" src="datetimepicker.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="stylesheets/style.css" type="text/css" />
  <style>
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }

    .carousel-inner img {
      width: 100%; /* Set width to 100% */
      min-height: 200px;
    }

    /* Hide the carousel text when the screen is less than 600 pixels wide */
    @media (max-width: 600px) {
      .carousel-caption {
        display: none; 
      }
    }
  </style>
</head>
<body>




<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="home.php">PathHackers</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="Home.php">Home</a></li>
        <li><a href="myprofile.php">My Profile</a></li>
        <li><a href="tariff.php">Tariff</a></li>
        <li><a href="locations.php">Locations</a></li>
        <li><a href="vehicles.php">Vehicles</a></li>
        <li><a href="Payments.php">Payments</a></li>
		<li><a href="booking.php">Book Now</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>



<?php
include('session.php');

if(isset($_SESSION['user'])!="")
{
	//header("Location: home.php");
}
include_once 'config.php';
?>
<center>
<div id="booking-form">
<form method="post">
<table align="center" width="30%" border="0">
<tr>
<td>
<select name="Location">  
<?php

	$sqllocation = "SELECT PS.id as ParkingID,L.name as locationname ,description FROM locations L join parkingspaces PS on PS.LocationID=L.ID where PS.status='available';";
echo $sqllocation;
	$resultlocation = $conn->query($sqllocation);	
	
	
if ($resultlocation->num_rows > 0) {
     // output data of each row
     while($row = $resultlocation->fetch_assoc()) {
         echo "<option value=".$row["ParkingID"].">".$row["locationname"]."_". $row["description"].   "</option>";
     }
} else {
     echo "No Location Available";
}

$conn->close();
?>              
</select>
</td>
</tr>

<tr>
<td><input type="Text" id="startDate" name="startDate" maxlength="25" size="25"><a href="javascript:NewCal('startDate','ddmmyyyy',true,24)"><img src="image/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a>
			</td>
</tr>
<tr>
<td><input type="Text" id="endDate" name="endDate" maxlength="25" size="25"><a href="javascript:NewCal('endDate','ddmmyyyy',true,24)"><img src="image/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a></td>
</tr>
<tr>
<td><button type="submit" name="btn-book">Book Now</button></td>
</tr>
</table>
</form>
</div>
</center>

<br><br>
<?php

include_once 'dbconnect.php';
if(isset($_POST['btn-book']))
{
	$Location = mysql_real_escape_string($_POST['Location']);
	echo $Location;	
	
	$startDate = mysql_real_escape_string($_POST['startDate']);
	$endDate = mysql_real_escape_string($_POST['endDate']);
	
	$Location=trim($Location);
	$startDate = trim($startDate);
	$endDate = trim($endDate);
	
	$date_new_start =date("Y-m-d h-m-s", strtotime($startDate) );
	$date_new_end =date("Y-m-d h-m-s", strtotime($endDate) );

	//$query = "INSERT INTO bookings(userId,parkingspacesId,status) VALUES('1','1','BOOKED')";
	if(mysql_query("INSERT INTO bookings(startdate,enddate,userId,parkingspacesId,status) VALUES('$date_new_start','$date_new_end','$user_check','$Location','BOOKED')"))
		{
			?>
			<script>alert('Successfully Booked');</script>
			<?php
		}
		else
		{
			?>
			<script>alert('Did not book. Please try again');</script>
			<?php
		}
	
		echo $query;
	
	
}
?>
<div style="padding:10px">
<?php
include('config.php');
$query1=mysql_query("select a.id,a.dateofbooking, a.startdate, a.enddate,b.name,c.description,d.fName,d.lName from bookings a,parkingspaces c,locations b, users d where b.id=c.locationId and a.userId=d.id and a.parkingSpacesId = c.id and d.id=$user_check");
$result = mysql_query($query);
		 
echo "<table class=\"table table-hover\" border='1'> 
		 <thead><tr><td>Booking Date</td><td>Start Date/Time</td><td>End Date/Time</td><td>Location Name</td><td>Description</td><td>First Name</td><td>Last Name</td><td></td><td></td></thead>";
while($query2=mysql_fetch_array($query1))
{
echo "<tr><td>".$query2['dateofbooking']."</td>";
echo "<td>".$query2['startdate']."</td>";
echo "<td>".$query2['enddate']."</td>";
echo "<td>".$query2['name']."</td>";
echo "<td>".$query2['description']."</td>";
echo "<td>".$query2['fName']."</td>";
echo "<td>".$query2['lName']."</td>";
echo "<td><a href='editbooking.php?id=".$query2['id']."'>Edit</a></td>";
echo "<td><a href='deletebooking.php?id=".$query2['id']."'>x</a></td><tr>";
}
?>
</ol>
</tbody>
  </table>
  
</div>

<footer class="container-fluid text-center">
  <p>Footer Text</p>
</footer>

</body>
</html>