<?php

session_start();
if(!isset($_SESSION['user_id']))
  header('location:login.php');

  if(!isset($_SESSION['username']))
  header('location:login.php');

  
  $conn=mysqli_connect('localhost','root','');
  mysqli_select_db($conn,'restaurant');

if(isset($_POST['reserv-submit'])) {

    
        $user= $_SESSION['user_id'];
        $username=$_SESSION['username'];
        $fname= $_POST['fname'];
        $lname= $_POST['lname'];
        $date= $_POST['date'];
        $time= $_POST['time'];
        $guests= $_POST['num_guests'];
        $mobile= $_POST['tele'];
        $details = $_POST['details'];

        echo $user;
        echo $username;
        echo $fname;
        echo $lname;
        echo $date;
        echo $time;
        echo $guests;
        echo $details;

        $res="insert into reservation (fname,lname,num_guests,date,time,mobile,details,user_id,username) 
        values('$fname','$lname','$guests','$date','$time','$mobile',' $details','$user','$username')";
    mysqli_query($conn,$res);
    header("Location:reservation.php?reservation=success");


}

?>
