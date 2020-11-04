<?php
session_start();

$conn=mysqli_connect('localhost','root','');
mysqli_select_db($conn,'restaurant');
$username=$_POST['user'];
$pass=$_POST['password'];


$s="select * from users where username='$username' && password='$pass'";
$result=mysqli_query($conn,$s);

$num=mysqli_num_rows($result);

while($rows = $result->fetch_assoc()){
$user_id=$rows['user_id'];
}

if($num==1){
	$_SESSION['username']=$username;
	$_SESSION['user_id']=$user_id;
	header('location:homepage.php');
}
else
{
	echo "Login invalid";
}

?>
