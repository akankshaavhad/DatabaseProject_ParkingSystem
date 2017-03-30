<?php
include('config.php');
include('session.php');

#echo "$user_check";
include_once 'dbconnect.php';

if(isset($_POST['btn-vehicle']))
{
	$vmake = mysql_real_escape_string($_POST['vmake']);
	$vnumber = mysql_real_escape_string($_POST['vnumber']);
	$vmodel = mysql_real_escape_string($_POST['vmodel']);
	
	$vmake = trim($vmake);
	$vnumber = trim($vnumber);
	$vmodel = trim($vmodel);
	
	// email exist or not
	//user id from the session
	$query = "INSERT INTO vehicle(userId, vehicleMake,vehicleNumber,vehicleModel) VALUES($user_check,'$vmake','$vnumber','$vmodel')";
	$result = mysql_query($query);
	if($result === true){
		?>
			<script>alert("New Vehicle has been registered");</script>
			<?php
	}else{
		?>
			<script>alert("Please verify the vehicle details");</script>
			<?php
	}
	

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Path Hackers Registered Vehile</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
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
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
<link rel="stylesheet" href="stylesheets/style.css" type="text/css" />

</head>
<body>
<center>
<div id="login-form">
<form method="post">
<table align="center" width="30%" border="0">
<tr>
<td><input type="text" name="vmake" placeholder="Vehicle Make" required /></td>
</tr>
<tr>
<td><input type="text" name="vnumber" placeholder="Vehicle Number" required /></td>
</tr>
<tr>
<td><input type="text" name="vmodel" placeholder="Vehicle Model" required /></td>
</tr>
<tr>
<td><a href="index.php"><button type="submit" name="btn-vehicle">Vehicle Register</button></td>
</tr>

</table>
<BR>
<table align="center" width="70%" border="1">
<tr><td colspan=3 align=Center><B>Registered Vehicles</B></td></tr>
<tr>
<td align= center><b>Vehicle make</b></td>
<td align= center><b>Vehicle Number</b></td>
<td align = center><b>Vehice Model</b></td>
</tr>
<?php


#echo "$user_check";
$sql = "SELECT vehicleMake, vehicleNumber, vehicleModel FROM vehicle where userId=$user_check";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
		 
         echo "<tr><td align=center>".$row["vehicleMake"]."</td>
		 <td align=center> ". $row["vehicleNumber"]. "</td>
		 <td align=center>" . $row["vehicleModel"] . "</td></tr>";
     }
} else {
     echo "No Vehicle is registered";
}


/*$query = "Selcet userid,vehicleMake,vehicleNumber,vehicleModel from vehicle";
$result = mysql_query($query);
echo $result*/
?>
</table>
</form>
</div>
</center>
</body>
</html>