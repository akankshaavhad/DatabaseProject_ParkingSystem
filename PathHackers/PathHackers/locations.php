<!DOCTYPE html>
<html>
<head>

  <title>Path Hackers</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script
src="http://maps.googleapis.com/maps/api/js">
</script>

<script>
var myCenter=new google.maps.LatLng(35.307898,-80.7297585);
var myCenter1=new google.maps.LatLng(35.30835325,-80.73572516);
var myCenter2=new google.maps.LatLng(35.30556026,-80.72702944);
var marker;

function initialize()
{
var mapProp = {
  center:myCenter,
  zoom:15,
  mapTypeId:google.maps.MapTypeId.ROADMAP
  };

var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

var marker=new google.maps.Marker({
  position:myCenter,
  animation:google.maps.Animation.BOUNCE
  });
  
  var marker1=new google.maps.Marker({
  position:myCenter1,
  animation:google.maps.Animation.BOUNCE
  });  
  var marker2=new google.maps.Marker({
  position:myCenter2,
  animation:google.maps.Animation.BOUNCE
  });

marker.setMap(map);
marker1.setMap(map);
marker2.setMap(map);
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>
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


<div id="googleMap" style="width:1200px;height:700px;"></div>

</body>
</html>
