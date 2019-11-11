<?php
	include_once 'include_ars_db.php';
	session_start();
	$userid = $_SESSION['userid'];
	$st = " ";
	if(isset($_POST['submit'])){
		//get details of flight booked by from database store them in variables
		$q = "select * from userbooksflight where user_id = '$userid';";
		$res = $conn->query($q);
		$i = 0;
		
		if($res){
			while($row = $res->fetch_assoc()){
				$i++;
				$dest = "select airport_name, city, country form airport where a_id = $row[dest];";
				$src = "select airport_name, city, country form airport where a_id = $row[src];";
				$s = $conn->query($src);
				$d = $conn->query($dest);
				$source = $s->fetch_assoc();
				$destination = $d->fetch_assoc();
				$st = $st."<br>$i<br>"."plane_id = $row[plane_id]<br>date of flight = $row[dateofflight]<br> from $source[airport_name], $source[city], $source[country] <br> to  $destination[airport_name], $destination[city], $destination[country] <br> departure time = $row[dept_time] <br> number of seats is $row[numofseats].";
			}
		}
	}
	$conn->close();
?>

<html>
	<head>
		<title>AirlineReservationSystem</title>
		<style>
		
		
			* {
			  box-sizing: border-box;
			}

			.row{
				text-align: center;
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
  				width : 200px;
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
		  	<h1>HELLO @<?php echo $userid;?></h1>
				<br><br>
				<!--user_id, plane_id, date, src, dest, src_country, dest_country, dept_time)-->
				<a href = "browseflights.php">Browse Flights</a><br><br><br><br>
				<form method = "POST">
					<input type = "submit" name = "submit" value = "View booked flights"><br><br>
				</form>
				<?php echo $st;  ?>
				
				<a href = "logout.php">LOG OUT</a><br><br>
				
				<a href = "welcomepage.php">BACK TO HOMEPAGE</a><br>
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
