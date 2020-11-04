
<?php

session_start();

$conn=mysqli_connect('localhost','root','');
mysqli_select_db($conn,'restaurant');
$username=$_POST['user'];
$pass=$_POST['password'];
$name=$_POST['name'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$s="select * from users where username='$username'";
$result=mysqli_query($conn,$s);
$num=mysqli_num_rows($result);
if($num==1)
{
	echo "Username taken";
}
else
{
	$reg="insert into users(username,password,name,email,mobile) values('$username','$pass','$name','$email','$mobile')";
	mysqli_query($conn,$reg);
	echo "Registration successful";?>
	<a href="login.php">Login</a>
<?php
}


?>