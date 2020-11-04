<?php
  session_start();
  if(!isset($_SESSION['user_id']))
  header('location:login.php');
 
?>
<!DOCTYPE html>
<html>
<head>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">  <!--bootstrap-->
 

    <style>
        .topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #4682b4;
  color: white;
}

.topnav-right {
  float: right;
}
</style>
</head>


<?php 
$db = mysqli_connect("localhost", "root", "", "clinic");?>

<div class="topnav">
  <a  href="homepage.php">Home Page</a>
  <a href="reservation.php">New Reservation</a>
  <a  class="active"href="view_reservation.php">View Reservation</a>
  <div class="topnav-right">
    
    <a href="logout.php">Logout</a>
  </div>
</div>

<body>
<?php 
$db = mysqli_connect("localhost", "root", "", "restaurant");

    if(isset($_SESSION['user_id'])){
        echo '<p class="text-white bg-dark text-center">'. $_SESSION['username'] .', Here you can check your reservation history</p><br>';
        
    
    if(isset($_GET['delete'])){
        if($_GET['delete'] == "error") {   //douleuei bazw ta errors apo ta headers.. prp na bgalw to requiered
            echo '<h5 class="bg-danger text-center">Error!</h5>';
        }
        if($_GET['delete'] == "success"){ 
            echo '<h5 class="bg-success text-center">Delete was successfull</h5>';
        }
    }  
  
 }

$id=$_SESSION['user_id'];
$list="select * from reservation where user_id='$id'";
$result=mysqli_query($db,$list);?>

<table class="table table-hover table-responsive-sm text-center">
                <thead>
                    <tr>
                        <th scope="col">Full Name</th>
                        <th scope="col">Guests</th>
                        <th scope="col">Reservation Date</th>
                        <th scope="col">Time Zone</th>
                        <th scope="col">Telephone</th>
                        <th scope="col">Comments</th>
                        <th class="table-danger" scope="col"></th>
                    </tr>
                </thead>
<?php
                while($row = $result->fetch_assoc()) {
                    ?>
    
                <tbody>
                    <tr>
                    <form action='delete.php' method='POST'>
                    <input name='reserve_id' type='hidden' value="<?php echo $row["reserve_id"]; ?>"/>
                      <th scope='row'><?php echo $row["fname"]; echo $row["lname"];?> </th>
                      <td ><?php echo $row["num_guests"]; ?></td>
                      <td> <?php echo $row["date"];?></td>
                      <td> <?php echo $row["time"]; ?></td>
                      <td> <?php echo $row["mobile"];?></td>
                      <td><?php  echo $row["details"];?></td>
                      <td class='table-danger'><button type='submit' name='delete-submit' class='btn btn-danger btn-sm'>Cancel</button></td>
                          </form>
                    </tr>
              </tbody>
   <?php         
        }   
        ?>
</table>      
</body>
</html>