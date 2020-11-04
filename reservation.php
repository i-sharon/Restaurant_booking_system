<?php
  session_start();
  if(!isset($_SESSION['user_id']))
  header('location:login.php');
 
?>

<!DOCTYPE  HTML>
<html>
    <head>  <title>Reservation
    </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
    body{
  margin: 0;
  padding: 0;
  font-family: sans-serif;
  background: url(1.jpg) no-repeat;
 
  background-size: cover;
}

    .wrap{
    width:600px;
    margin:auto;
    margin-top: 0px;
       padding:50px;
    background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
    }
    
    form{
    border:1px dotted white;
    background-color:#f8f5ee;
    padding:10px;
    }

    h3{
    text-align:center;
    
    color:white;
    width:600px;
    margin:auto;
    margin-top: 25px;
    
  align-content: center;
    
    background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
    }
   
  

    button[type=submit] {
      
      background-color:#4682B4;
      color: white;
      padding: 14px 20px;
      border: none;
     
    }

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
h4{
  width:600px;
    margin:auto;
    padding: 20px;
  align-content: center;

}    
    
    </style>
    </head>
    <div class="topnav">
        <a  href="homepage.php">Home Page</a>
        <a  class="active" href="reservation.php">New Reservation</a>
        <a href="view_reservation.php">View Reservation</a>
        <div class="topnav-right">
          
          <a href="logout.php">Logout</a>
        </div>
      </div>

    
    <body>
      
    <?php
    if(isset($_GET['reservation'])) {   
           if($_GET['reservation'] == "success"){ 
            echo '<h4 class="bg-success text-center" align="center" >Your reservation was successfull!</h4>';
        }
        }
        ?>
<h3> New Reservation</h3>
    <div class="wrap"><form action="reserve.php" method="post">
    
      
      
            <div class="form-group">
            <label>First Name</label>
                <input type="text" class="form-control" name="fname" placeholder="First Name" required="required">
                <small class="form-text text-muted">First name must be 2-20 characters long</small>
            </div>
            <div class="form-group">
            <label>Last Name</label>
                <input type="text" class="form-control" name="lname" placeholder="Last Name" required="required">
                <small class="form-text text-muted">Last name must be 2-20 characters long</small>
            </div>   
            <div class="form-group">
            <label>Enter Date</label>
        	<input type="date" class="form-control" name="date" placeholder="Date" required="required">
            </div>
            <div class="form-group">
		<label>Enter Time Zone</label>
		<select class="form-control" name="time">
		<option>12:00 - 16:00</option>
		<option>16:00 - 20:00</option>
		<option>20:00 - 00:00</option>
		</select>
            </div>
            <div class="form-group">
            <label>Enter number of Guests</label>
        	<input type="number" class="form-control" min="1" name="num_guests" placeholder="Guests" required="required">
                <small class="form-text text-muted">Minimum value is 1</small>
            </div>
            <div class="form-group">
            <label for="guests">Enter your Mobile Number</label>
                <input type="telephone" class="form-control" name="tele" placeholder="Telephone" required="required">
                <small class="form-text text-muted">Mobile number must be 10 characters long</small>
            </div>
            <div class="form-group">
            <label>Other Details</label>
                <textarea class="form-control" name="details" placeholder="Other details" rows="3"></textarea>
                <small class="form-text text-muted">Comments must be less than 200 characters</small>
            </div>        
        
            <div class="form-group">
            <button type="submit" name="reserv-submit" class="btn btn-dark btn-lg btn-block">Submit Reservation</button>
            </div>
        </form>
        </div>
    
    </body>
    </html>
