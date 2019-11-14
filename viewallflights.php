<?php
	include_once 'include_ars_db.php';
	session_start();
	$userid = $_SESSION['userid'];
	$st = " ";

	//get details of flight from database store them in variables
	$q = "select * from flight;";
	$res = $conn->query($q);
	$i = 0;
	
	if($res){
		while($row = $res->fetch_assoc()){
			$i++;
			$dest = "select a_name, city, country from airport where a_id = '$row[dest]';";
			$src = "select a_name, city, country from airport where a_id = '$row[src]';";
			$capa = "select tot_capacity from airplane where plane_id = '$row[plane_id]';";
			$s = $conn->query($src);
			$d = $conn->query($dest);
			$c = $conn->query($capa);
			$capacity = $c->fetch_assoc();
			$source = $s->fetch_assoc();
			$destination = $d->fetch_assoc();
			$st = $st."<br>$i<br>"."<table><tr><td>Plane_id </td><td> $row[plane_id]</td></tr><tr><td>Date of flight </td><td> $row[dateofflight]</td></tr><tr><td> From</td><td> $source[a_name], $source[city], $source[country] </td></tr><tr><td> To </td><td> $destination[a_name], $destination[city], $destination[country] </td></tr><tr><td> Departure time </td><td> $row[dept_time] </td></tr><tr><td> Capacity</td><td> $capacity[tot_capacity]</td><tr><td> Number of passengers </td><td> $row[passengers]</td></tr><tr><td>Cost</td><td> $row[cost]</td></tr></table>";
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
				overflow: hidden;
				display: flex;
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
			table, th, td {
				border: 3px solid black;
				border-collapse: collapse;
				padding: 15px;
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
				
				<?php echo $st;  ?>
				
				<br><br><a href = "logout.php">LOG OUT</a><br><br>
				<br><br><a href = "adminlogin.php">BACK TO ADMIN LOGIN</a><br><br>
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
