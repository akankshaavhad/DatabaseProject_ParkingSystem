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
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<div style="padding:10px">

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

$sql = "SELECT tariffType,pricePerHour,autoRenewal,roleName FROM tariffs,userrole where tariffs.roleID=userrole.id";

$result = $conn->query($sql);




if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
		 
         echo "<table class=\"table table-hover\" border='1' width=80%>  
		 <tr><td width=50%>Tariff Type</td><td width=50%>". $row["tariffType"]. "</td></tr>
		 <tr><td width=50%>Price per Hour</td><td width=50%> ". $row["pricePerHour"]. "</td></tr>
		 <tr><td width=50%>Role Name</td><td width=50%>" . $row["roleName"] . "</td></tr>
  </table>";
     }
} else {
     echo "0 results";
}

$conn->close();

?>

</div>

</body>
</html>
