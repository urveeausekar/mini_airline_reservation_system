<?php
	session_start();
	include_once 'include_ars_db.php';
	
	$accerr = " ";
	
	$acc = NULL;
	$notify = " ";
	$numoferr = 0;
	if(isset($_POST['submit'])){
		$acc = $_POST['acc'];
		if(empty($_POST['acc'])){
			$accerr = "Card number field cannot be left empty!";
			$numoferr++;
		}else if(!is_numeric($acc)){
				$accerr = "Please enter valid card number consisting of only numbers";
				$numoferr++;
		}
		
		
		$uname = $_SESSIONS['userid'];
		
		$q = "select card_number from userownscard where user_id = '$userid';";
		$res = $conn->query($q);
		if($res){
			$row = $res->fetch_assoc();
			if($acc == $row['card_number']){
				
				$res = $conn->query($_SESSION['insertbook']);
				$res1 = $conn->query($_SESSION['updateflightquery']);
				
				if($res1 && $res)
					$notify = "Bookings done!";
			}
				
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
		  	<h1>PAYMENT PAGE</h1>
				<br><br>
			<span class = "error">All</span> details must be entered.<br><br>	
			<fieldset>
			<form method = "POST">
				
				Account Number :<input type = "text" name = "acc"value ='<?php echo htmlentities($acc)?>'>
				<span class = "error"> <?php echo $accerr; ?></span><br><br>
				
				<input type = "submit" name = "submit" value = "Pay!" ><br><br>
			</form>
			<h2><?php echo $notify;?></h2>
			<br><br>
			</fieldset>
			<a href = "logout.php">LOG OUT</a><br><br>
			<a href = "userlogin.php"> BACK TO USER PAGE</a><br><br>
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
