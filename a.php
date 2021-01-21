<?php
session_start();
$conn = mysqli_connect('localhost','root','','testing');

if(isset($_POST['sub']))
{
	$a = $_POST['t1'];
	$b = $_POST['t2'];
	
	$query = "SELECT * FROM user WHERE u_name = '$a' AND u_pass = '$b'";
	$result = mysqli_query($conn,$query);
		
	if(mysqli_num_rows($result) > 0)
	{
		$_SESSION['username'] = $a;
		header('location: dash.php');
		}
		
		else {
			header('location: a.php');
			}
	}




?>





<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form method="post">
Username <input type="text" name="t1" />
Password <input type="password" name="t2"/>
<input type="submit" name="sub" value="Sign In"/>
</form>
</body>
</html>