<?php
session_start();
if(!isset($_SESSION['user_id']))
header('location:login.php');

if(isset($_POST['delete-submit'])) {
 
    $db = mysqli_connect("localhost", "root", "", "restaurant");
 
 $reservation_id = $_POST['reserve_id'];
 echo  $reservation_id;
    
 $sql = "DELETE FROM reservation WHERE reserve_id =$reservation_id";
if (mysqli_query($db, $sql)) {
    header("Location:view_reservation.php?delete=success");
} else {
    header("Location:view_reservation.php?delete=error");
}
}
?>
