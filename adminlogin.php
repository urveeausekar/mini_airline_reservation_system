<?php
	include_once 'include_ars_db.php';
	session_start();
	$adminid = $_SESSION['userid'];
	
	$conn->close();
	
?>

<html>
	<head>
		<title>AirlineReservationSystem</title>
		<style>
			.error{
				color:#B30000;
			}
		
			* {
			  box-sizing: border-box;
			}

			.row{
				text-align: center;
				overflow: hidden;
				display: flex;
				/*overflow: hidden;
				display: flex;*/
			}
			.column {
			  float: left;
			  padding: 10px;
			  
			   
			}

			.left, .right {
			  width: 20%;
			}

			.middle {
			  width: 60%;
			  
			}

			/* Clear floats after the columns */
			.row:after {
			  content: "";
			  display: table;
			  clear: both;
			}
			
			a{
			
			}
			body{
  				 
  				text-align: center;
  				font-family: "Comic Sans MS";
  	
			}
			
			h1{
				
				text-align: center;
			}
			fieldset{
				background-color: #808080;
				margin-left: auto;
  				margin-right: auto;
  				width : 450px;
  				border-style: solid;
				border-width: 2px;
				border-radius: 8px;
				/*margin-left: 300px;
				margin-right: 300px;*/
			}
			legend{
				font-size: 20px 
			}
			p{
				border-style: hidden;
  				/*margin-left: 80px;
				margin-right: 80px;*/
				background-color: #aaa;
				padding-top: 4px;
				padding-right: 10px;
				padding-bottom: 4px;
				padding-left: 10px;
			}
			textarea{
				
				font-weight:bold;
				font-size: 20px
			}


		</style>
	</head>
	<body>
		
		

		<div class="row">
		  <div class="column left" style="background-color: #000000;">
		    
		    
		  </div>
		  <div class="column middle" style="background-color:#ccc;">
		  	<h1>WELCOME TO THE ADMIN PAGE, @<?php echo $adminid;?></h1>
				<br><br>
				
				<a href = "viewbookings.php">View Flight Booking Details of Users</a><br><br><br><br>
				<a href = "cancelbooking.php">Cancel A Booking</a><br><br><br><br>
				<a href = "cancelflight.php">Cancel A Flight</a><br><br><br><br>
				<a href = "addflight.php">Add A Flight</a><br><br><br><br>
				<a href = "addadmin.php">Add Another Admin</a><br><br><br><br>
				<a href = "viewallflights.php">View all flights</a><br><br><br><br>
				<a href = "logout.php">LOG OUT</a><br><br>
		  </div>
		  <div class="column right" style="background-color:#000000;">
		    
		   
		  </div>
		</div>
		
		<p>
			<b><u>Airline Reservation System</u>
			made by
			Urvee Ausekar  111713007 and 
			Tejaswini Kokate  111703075
			</b>
		</p>
	
	</body>
</html>
