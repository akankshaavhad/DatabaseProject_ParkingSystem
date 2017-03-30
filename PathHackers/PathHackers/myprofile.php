<!DOCTYPE html>
<html lang="en">
<head>
  <title>Path Hackers</title>
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
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<?php
include('session.php');

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

$sql = "SELECT UserName, FName, LName, EmailID,Address, City, State,PhoneNumber FROM users where id=$user_check";

//$sqlrole ="SELECT roleName FROM userrole where id = 1";

$result = $conn->query($sql);
/*
$resultrole = $conn->query($sqlrole);

if ($resultrole->num_rows > 0) {
     // output data of each row
     while($row = $resultrole->fetch_assoc()) {
		 $rowid = $row["roleName"];
	}
}
*/
if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
		 
         echo "<table border='0' align=Center width=80%> 
		 <tr> <td colspan=2 align=Center><b>User Profile</b></td> </tr>
		 <tr><td><br></td></tr>
		 </table>
		 
		 <table border=1 width=60% align= Center>
		 <tr><td align=Center>Username</td><td align=Center> ". $row["UserName"]. "</td></tr>
		 <tr><td align=Center>FirstName</td><td align=Center>" .$row["FName"] ."</td></tr>
		 <tr><td align=Center>LastName</td><td align=Center>" .$row["LName"] ."</td></tr>
		 <tr><td align=Center>Email</td><td align=Center>" . $row["EmailID"] . "</td></tr>
		 <tr><td align=Center>Address</td><td align=Center>" .$row["Address"] ."</td></tr>
		 <tr><td align=Center>City</td><td align=Center>" .$row["City"] ."</td></tr>
		 <tr><td align=Center>State</td><td align=Center>" .$row["State"] ."</td></tr>
		 <tr><td align=Center>Phone Number</td><td align=Center>" .$row["PhoneNumber"] ."</td></tr>
  </table>";
     }
} else {
     echo "Profile not found. Please contact Administrator";
}

$conn->close();

?>


</body>
</html>
