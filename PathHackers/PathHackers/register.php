<?php
session_start();
if(isset($_SESSION['user'])!="")
{
	#header("Location: index.php");
}
include_once 'dbconnect.php';

if(isset($_POST['btn-signup']))
{
	$uname = mysql_real_escape_string($_POST['uname']);
	$email = mysql_real_escape_string($_POST['email']);
	$add = mysql_real_escape_string($_POST['add']);
	$state = mysql_real_escape_string($_POST['state']);
	$city = mysql_real_escape_string($_POST['city']);
	$country = mysql_real_escape_string($_POST['country']);
	$zipcode = mysql_real_escape_string($_POST['zipcode']);
	$phonenumber = mysql_real_escape_string($_POST['phonenumber']);
	$upass = md5(mysql_real_escape_string($_POST['pass']));
	
	$uname = trim($uname);
	$email = trim($email);
	$add = trim($add);
	$state = trim($state);
	$city = trim($city);
	$country = trim($country);
	$zipcode = trim($zipcode);
	$phonenumber = trim($phonenumber);
	$upass = trim($upass);
	
	// email exist or not
	$query = "SELECT username FROM users WHERE emailId='$email' or username='$uname'";
	$result = mysql_query($query);
	
	$count = mysql_num_rows($result); // if email not found then register
	
	if($count == 0){
		
		if(mysql_query("INSERT INTO users(username,emailId,password,address,state,city,phonenumber,zipcode,country) VALUES('$uname','$email','$upass','$add','$state','$city','$phonenumber','$zipcode','$country')"))
		{
			?>
			<script>alert('successfully registered ');</script>
			<?php
			header('location:index.php');
		}
		else
		{
			?>
			<script>alert('error while registering ...');</script>
			<?php
		}		
	}
	else{
			?>
			<script>alert('Sorry Email ID already taken ...');</script>
			<?php
	}
	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Path Hackers Registration</title>
<link rel="stylesheet" href="style1.css" type="text/css" />

</head>
<body>
<center>
<div id="login-form">
<form method="post">
<table align="center" width="30%" border="0">
<tr>
<td><input type="text" name="uname" placeholder="User Name" required /></td>
</tr>
<tr>
<td><input type="email" name="email" placeholder="Your Email" required /></td>
</tr>
<tr>
<td><input type="password" name="pass" placeholder="Your Password" required /></td>
</tr>

<tr>
<td><input type="text" name="address" placeholder="Address"  /></td>
</tr>

<tr>
<td><input type="text" name="state" placeholder="State"  /></td>
</tr>

<tr>
<td><input type="text" name="city" placeholder="City"  /></td>
</tr>

<tr>
<td><input type="number" name="zipcode" placeholder="Zipcode"  /></td>
</tr>

<tr>
<td><input type="text" name="country" placeholder="Country"  /></td>
</tr>


<tr>
<td><input type="number" name="phonenumber" placeholder="Phone number" required /></td>
</tr>




<tr>
<td><button type="submit" name="btn-signup">Sign Me Up</button></td>
</tr>
<tr>
<td><a href="index.php">Sign In Here!</a></td>
</tr>
</table>
</form>
</div>
</center>
</body>
</html>