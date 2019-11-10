<?php
	include_once 'include_ars_db.php';
	session_start();
	
	//declaring variables for error checking
	
	$perr = " ";
	$uerr = " ";
	
	$passw = NULL;
	$uname = NULL;
	$numoferr = 0;
	
	$loginmsg = " ";
	if(isset($_POST['submit'])){
		
		$uname = $_POST['loginid'];
		$passw = $_POST['passkey'];
		
		
		if(empty($_POST['loginid'])){
			echo "In empty uname";
			$uerr = "Username can't be left empty!";
			$numoferr++;
		}
		
		if(empty($passw)){
			$perr = "Password can't be left empty!";
			$numoferr++;
		}
		
		$uname = $conn->real_escape_string($uname);
		$gethash_user = "select password_hash from password where user_id = '$uname';";
		//"select password_hash from password where user_id = '$uname';";
		$gethash_admin = "select password_hash from admin where admin_id = '$uname';";
		
		//check if person who wants to login is user
		$res = $conn->query($gethash_user);
		//printf("Error message: %s\n", $conn->error);
		if($res){
			$row = $res->fetch_assoc();
			//printf("Error message: %s\n", $conn->error);
			$passw_hash = $row["password_hash"];
			if(password_verify($passw, $passw_hash)){
				//log the user in
				$loginmsg = "Welcome, ".$uname."!";
				$_SESSION['userid'] = $uname;
				$_SESSION['loggedin'] = "yes";
				$_SESSION['type'] = "user";
				header("Location:http://localhost/myfiles/DBMSmp/userlogin.php");
			}
		}
		
		
		$res->free();
		//check if person who wants to login is admin
		$res = $conn->query($gethash_admin);
		if($res){
			$row = $res->fetch_assoc();
			$passw_hash = $row["password_hash"];
			if(password_verify($passw, $passw_hash)){
				//log the admin in
				echo "Verified admin login, passw matches";
				$loginmsg = "Welcome, ".$uname."!";
				$_SESSION['userid'] = $uname;
				$_SESSION['loggedin'] = "yes";
				$_SESSION['type'] = "admin";
				header("Location:http://localhost/myfiles/DBMSmp/adminlogin.php");
			}
		}
		$loginmsg = "Invalid login id or password. Please try again.";
	
			// working like this;
		
	}
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
			}
			.column {
			  float: left;
			  padding: 10px;
			  height: 100%; /* Should be removed. Only for demonstration */
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
  				width : 300px;
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
		  	<h1>WELCOME TO YOUR AIRLINE RESERVATIONS PROVIDER!!</h1>
			New user? Then <a href = "signup.php">sign up!</a><br><br>
			<b>Or Sign In</b><br>
			<fieldset>
				<form method = "POST">
					LoginId <input type = "text" name = "loginid" value ='<?php echo htmlentities($uname)?>'>
			  		<span class = "error"> <?php echo $uerr; ?> </span> <br><br>
					
					
					Password <input type = "password" name = "passkey" value ='<?php echo htmlentities($passw)?>'>
					
					<br><br>
					<input type = "submit" name = "submit" value = "Log In"><br><br>
					<span class = "error"><?php echo $loginmsg; ?></span>
				</form>
			</fieldset>
			<br><br><br><br>
			<a href = "browseflights.php">BROWSE FLIGHTS</a>
			<br><br><br><br>
			
		   
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
