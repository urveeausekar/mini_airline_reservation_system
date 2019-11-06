<?php
	$newpasserr = " ";
	$newuerr = " ";
	
	$newpasskey = NULL;
	$newuname = NULL;
	$numoferr = 0;
	if(isset($_POST['submit2'])){
		
		$newuname = $_POST['newuname'];
		if(empty($_POST['newuname'])){
			$newuerr = "Please enter your username";
			$numoferr++;
		}
		
		$newpasskey = $_POST['newpasskey'];
		if(empty($_POST['newpasskey'])){
			$newpasserr = "Please enter a valid password";
			$numoferr++;
		}
	}
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
				/*overflow: hidden;
				display: flex;*/
			}
			.column {
			  float: left;
			  padding: 10px;
			  height: 100%;
			   
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
		  	<h1>CREATE AN ADMIN LOGIN</h1>
				<br><br>
				<!--user_id, plane_id, date, src, dest, src_country, dest_country, dept_time)
				<a href = "/var/www/html/myfiles/DBMSmp/">View Flight Bookings</a><br><br><br><br>
				<a href = "/var/www/html/myfiles/DBMSmp/">Cancel A Booking</a><br><br><br><br>
				<a href = "/var/www/html/myfiles/DBMSmp/">Cancel Flight Bookings</a><br><br><br><br>
				<a href = "/var/www/html/myfiles/DBMSmp/">Add Another Admin</a><br><br><br><br>-->
			
			<!--Code to add another admin--------------------------------------------->
			
			</fieldset>
			<h3>Add Another Admin</h3>
			<fieldset>
			<form method = "POST">
				Username : <input type = "text" name = "newuname" value ='<?php echo htmlentities($newuname)?>'> 
				<span class = "error"> <?php echo $newuerr; ?></span><br><br>
				
				Password : <input type = "password" name = "newpasskey" value ='<?php echo htmlentities($newpasskey)?>'> 
				<span class = "error"> <?php echo $newpasserr; ?></span><br><br><br>
				<input type = "submit" name = "submit2" value = "Add" ><br>
			</form>
			</fieldset>
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
