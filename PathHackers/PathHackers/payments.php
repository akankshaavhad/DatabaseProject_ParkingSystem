<?php
include('config.php');
include('session.php');

#echo "$user_check";
include_once 'dbconnect.php';

if(isset($_POST['btn-vehicle']))
{
	
	$carddetails = mysql_real_escape_string($_POST['carddetails']);
	$expirydate = mysql_real_escape_string($_POST['expirydate']);
	$paymentType = mysql_real_escape_string($_POST['paymentType']);
	
	$carddetails = trim($carddetails);
	$expirydate = trim($expirydate);
	$paymentType = trim($paymentType);
	
	echo $expirydate;
	
	$date_new =date("Y-m-d h-m-s", strtotime($expirydate) );
	

	
	
	
	
	
	// email exist or not
	//user id from the session
	$query = "INSERT INTO payment(userId, cardDetails,expirydate,paymentType) VALUES($user_check,'$carddetails','$date_new','$paymentType')";
	$result = mysql_query($query);
	
	
	echo '<script language="javascript">';
	echo 'alert("Payment Done")';
	echo '</script>';
	

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Path Hackers Payment</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script language="javascript" type="text/javascript" src="datetimepicker.js">
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
<td><input type="text" name="paymentType" placeholder="Payment Type" required /></td>
</tr>
<tr>
<td><input type="text" name="carddetails" placeholder="CardDetails" required /></td>
</tr>
<tr>
<td>
<input type="Text" id="expirydate" name="expirydate" maxlength="25" size="25"><a href="javascript:NewCal('expirydate','ddmmyyyy',true,24)"><img src="image/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a>
			</td>
</tr>

<tr>
<td><a href="index.php"><button type="submit" name="btn-vehicle">Payment</button></td>
</tr>

</table>

</form>
</div>
</center>
</body>
</html>