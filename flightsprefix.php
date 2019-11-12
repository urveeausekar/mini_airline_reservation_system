<?php
	session_start();
	include_once 'include_ars_db.php';
	$i = $_SESSION['numberofflights'];
	//echo $i."value of i"."<br>";
	for($j = 0; $j < $i; $j++){
		//echo "IN for"." ".$j."<br>";
		if(isset($_POST[$j])){
			echo"in isset post";
			if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == "yes"){
				//echo "in logged in";
				$uname = $_SESSION['userid'];
				$plane_id = $_POST['plane_id'];
				$dateofflight = $_POST['date'];
				$src = $_POST['src'];
				$dest = $_POST['dest'];
				$dept_time = $_POST['depttime'];
				$numofseats = $_POST['numofseats'];
				$arr_time = $_POST['arrtime'];
				
				$q = "insert into userbooksflight values('$uname', '$plane_id', '$dateofflight', '$src', '$dest', '$dept_time', '$numofseats');";
				$u = "update flight set passengers = passengers + '$numofseats' where plane_id = '$plane_id' and dateofflight = '$dateofflight' and src = '$src' and dest = '$dest' and dept_time = '$dept_time' and arr_time = '$arr_time';";
				
				$_SESSION['updateflightquery'] = $u;
				$_SESSION['insertbook'] = $q;
				
				header("Location:http://localhost/myfiles/DBMSmp/payment.php");
			}else{
				echo"in else";
				header("Location:http://localhost/myfiles/DBMSmp/welcomepage.php");
			}
		}
	}
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
			  width: 15%;
			}

			.middle {
			  width: 70%;
			  
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
		  	<h1>Please click on BOOK button to book a flight.</h1>
		  	<span class = "error">Please note that you have to be logged in to book a flight</span><br><br>
		  	<!--<a href = "/var/www/html/myfiles/DBMSmp/loginpage.php">Log In</a> -->
			
			<form method = "POST">
			
		   


