<?php
session_start();
include_once 'dbconnect.php';
unset($_SESSION["user"]);

if(isset($_SESSION['user'])!="")
{
	#header("Location: index.php");
}

if(isset($_POST['btn-login']))
{
	$email = mysql_real_escape_string($_POST['email']);
	$upass = mysql_real_escape_string($_POST['pass']);
	
	$email = trim($email);
	$upass = trim($upass);
	
	$res=mysql_query("SELECT id, emailId, fname, password FROM users WHERE emailId='$email'");
	$row=mysql_fetch_array($res);
	#echo "====== $row res----";
	
	$count = mysql_num_rows($res); // if uname/pass correct it returns must be 1 row
	#echo $row]['password']
	?>
		
	<?php
	#echo $row['password'];
	#echo "-------";
	#echo md5($upass);
	if($count == 1 && $row['password']==md5($upass))
	{
		?>
		<script>alert('Username / Password Seems correct!');</script>
		<?php
		
		$_SESSION['user'] = $row['id'];
		header("Location: home.php");
		
	}
	else
	{
		
		?>
        <script>alert("ALERT: Incorrect Username / Password pair!");</script>
        <?php
	}
	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Path Hackers Login</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
<form method="post" class="login">
    <p>
      <label for="login">Email:</label>
      <input type="text" name="email" id="email" placeholder="name@example.com">
    </p>

    <p>
      <label for="password">Password:</label>
      <input type="password" name="pass" id="pass" placeholder="*********">
    </p>

    <p class="login-submit">
      <button type="submit" name ="btn-login" class="login-button">Login</button>
    </p>

	
	
	<br><br>
	<div align = "center">
	<p>
	Not a member? 
	<br>
   <tr>
   
   <td><a href ="register.php" align = "left">Sign Up!</a></td>
   
   </tr>
   </div>
  </form>

  
</html>