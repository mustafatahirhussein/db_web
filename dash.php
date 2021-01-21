
<?php
session_start();
$conn = mysqli_connect('localhost','root','','testing');

if($_SESSION['username'])
{
	echo "Welcome user : ".$_SESSION['username'];	
	
	if(isset($_POST['img']))
	{
		$file = $_FILES['f1']['name'];
	$tmpname = $_FILES['f1']['tmp_name'];
	$type = $_FILES['f1']['type'];
	
	$name = addslashes($file);
	$tmp = addslashes(file_get_contents($tmpname));
	
	$query = "INSERT INTO image(name,image) VALUES('$name','$tmp')";
	$result = mysqli_query($conn,$query);
	
	$query = "select image.name, image.image from image inner join user where image.id = user.id";
	$result = mysqli_query($conn,$query);
	
	while($row = mysqli_fetch_array($result))
	{
		echo '<img src="data:image;base64,'.base64_encode($row['image']).'" width="300" height="400">';
		}
		
	}
	}
	else {
		
		header('location: a.php');
	}
?>

<form method="post" enctype="multipart/form-data">
<br>
<br>
<input type="file" name="f1"/>
<input type="submit" name="img" value="Upload Image"/>
</form>