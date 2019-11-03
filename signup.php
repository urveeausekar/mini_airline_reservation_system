<?php
	//declaring variables for error checking
	$fnerr = " ";
	$mnerr = " ";
	$lnerr = " ";
	$emailerr = " ";
	$phoneerr = " ";
	$cityerr = " ";
	$countryerr = " ";
	$addrerr = " ";
	$cardNumerr = " ";
	$dateerr = " ";
	$rderr = " ";  //this is an error of the radio buttons for type of card
	$uerr = " ";
	$passerr = " ";
	$numoferr = 0;
	
	$fname = NULL;
	$mname = NULL;
	$lname = NULL;
	$email = NULL;
	$phone = NULL;
	$city = NULL;
	$country = NULL;
	$addr = NULL;
	$cardNum = NULL;
	$dateofexp = NULL;
	$uname = NULL;
	$passw = NULL;
	if(isset($_POST['submit'])){
		$fname = $_POST['fname'];
		if(empty($_POST['fname'])){
			$fnerr = "First Name cannot be left empty!";
			$numoferr++;
		}else{
			if(!preg_match('/^[a-zA-Z]*$/',$fname)){
				$fnerr = "Please enter valid first name consisting of only alphabets";
				$numoferr++;
			}
		}
		//validated first name
		
		$mname = $_POST['mname'];
		if(empty($_POST['mname'])){
			$mnerr = "Middle Name cannot be left empty!";
			$numoferr++;
		}else{
			if(!preg_match('/^[a-zA-Z]*$/',$mname)){
				$mnerr = "Please enter valid middle name consisting of only alphabets";
				$numoferr++;
			}
		}
		//validated middle name
		
		$lname = $_POST['lname'];
		if(empty($_POST['lname'])){
			$lnerr = "Last Name cannot be left empty!";
			$numoferr++;
		}else{
			if(!preg_match('/^[a-zA-Z]*$/',$lname)){
				$lnerr = "Please enter valid last name consisting of only alphabets";
				$numoferr++;
			}
		}
		//last name validated
		
		$email = $_POST['email'];
		if(empty($_POST['email'])){
			$emailerr = "Please enter your email";
			$numoferr++;
		}else{
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$emailerr = "Please enter valid email.";
				$numoferr++;
			}
		}
		//email validated
		
		$phone = $_POST['phone'];
		if(empty($phone)){
			$phoneerr = "Please enter your phone number";
			$numoferr++;
		}else{
			if(!is_numeric($phone)){
				$phoneerr = "Please enter valid phone number";
				$numoferr++;
			}
		}
		
		$city = $_POST['city'];
		if(empty($_POST['city'])){
			$cityerr = "City Name cannot be left empty!";
			$numoferr++;
		}else{
			if(!preg_match('/^[a-zA-Z]*$/',$city)){
				$cityerr = "Please enter valid city name consisting of only alphabets";
				$numoferr++;
			}
		}
		
		
		$country = $_POST['country'];
		if(empty($_POST['country'])){
			$countryerr = "Country Name cannot be left empty!";
			$numoferr++;
		}else{
			if(!preg_match('/^[a-zA-Z]*$/',$country)){
				$countryerr = "Please enter valid country name consisting of only alphabets";
				$numoferr++;
			}
		}
		
		
		$addr = $_POST['add'];
		if(empty($_POST['add'])){
			$addrerr = "Address field cannot be left empty!";
			$numoferr++;
		}
		
		
		$cardNum = $_POST['card'];
		if(empty($_POST['card'])){
			$cardNumerr = "Card number field cannot be left empty!";
			$numoferr++;
		}
		
		
		$dateofexp = $_POST['dateofexp'];
		if(empty($_POST['dateofexp'])){
			$dateerr = "Date field cannot be left empty!";
			$numoferr++;
		}
		
		
		if(isset($_POST['typeofcard']) && $_POST['typeofcard'] == "credit")
			$typeofcard = "credit";
		else if(isset($_POST['typeofcard']) && $_POST['typeofcard'] == "debit")
			$typeofcard = "debit";
		else
			$rderr = "You must select a type of card!";
			
			
		$uname = $_POST['uname'];
		if(empty($_POST['uname'])){
			$uerr = "Please enter your username";
			$numoferr++;
		}
		
		$passw = $_POST['passkey'];
		if(empty($_POST['passkey'])){
			$passerr = "Please enter a valid password";
		}
	}
?>

<html>
	<head>
		<title>SignUp</title>
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
			  height: 260%; 
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
			
			.error{ 
				color:#B30000;
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
  				width : 550px;
  				border-style: solid;
				border-width: 2px;
				border-radius: 8px;
				overflow: auto;
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
				
				font-size: 15px
			}


		</style>
	</head>
	<body>
		
		

		<div class="row">
		  <div class="column left" style="background-color: #000000;">
		    
		    
		  </div>
		  <div class="column middle" style="background-color:#ccc;">
		  	<h1>SIGN UP</h1>
		  	<br><br><span class = "error">ALL details are mandatory. </span> 
			<form method = "POST">
			<br>
				<h3>Personal Details</h3>
				<fieldset>
				
					First Name : <input type = "text" name = "fname" value ='<?php echo htmlentities($fname)?>'>
					<span class = "error"> <?php echo $fnerr; ?></span> <br><br>
					
					Middle Name : <input type = "text" name = "mname" value ='<?php echo htmlentities($mname)?>'> 
					<span class = "error"> <?php echo $mnerr; ?> </span><br><br>
					
					Lase Name : <input type = "text" name = "lname" value ='<?php echo htmlentities($lname)?>'> 
					<span class = "error"> <?php echo $lnerr; ?> </span><br><br>
					
					Email Address : <input type = "text" name = "email" value ='<?php echo htmlentities($email)?>'> 
					<span class = "error"> <?php echo $emailerr; ?></span><br><br>
					
					Phone Number : <input type = "text" name = "phone" value ='<?php echo htmlentities($phone)?>'>
					<span class = "error"> <?php echo $phoneerr; ?></span> <br><br>
					
					Country : <input type = "text" name = "country" value ='<?php echo htmlentities($country)?>'> 
					<span class = "error"> <?php echo $countryerr; ?></span><br><br>
					
					City : <input type = "text" name = "city" value ='<?php echo htmlentities($city)?>'> 
					<span class = "error"> <?php echo $cityerr; ?> </span><br><br>
					
					Address : <br>
					<textarea name = "add" cols = "50" rows = "4" value ='<?php echo htmlentities($addr)?>' placeholder = "Input your address here"> </textarea>
					<span class = "error"> <?php echo $addrerr; ?></span><br><br>
					
				</fieldset>
				<br><br>
				<h3>Payment Details</h3>
				<fieldset>
				
				
					Credit or Debit Card Number : <input type = "text" name = "card" value ='<?php echo htmlentities($cardNum)?>'> 
					<span class = "error"> <?php echo $cardNumerr; ?></span><br><br>
					
					Date of Expiry : <input type = "date" name = "dateofexp" value ='<?php echo htmlentities($dateofexp)?>'> 
					<span class = "error"> <?php echo $dateerr; ?></span><br><br>
					
					Type of Card : <br><br>
					Credit Card <input type = "radio" name = "typeofcard" value = "credit"><br>
					Debit Card <input type = "radio" name = "typeofcard" value = "debit"><br>
					<span class = "error"><?php echo $rderr; ?></span><br><br>
				</fieldset>
				<br><br>
				<input type = "submit" name = "submit" value = "Sign Up">
				<h3>Login Id and Password</h3>
				<fieldset>
					Username : <input type = "text" name = "uname" value ='<?php echo htmlentities($uname)?>'> 
					<span class = "error"> <?php echo $uerr; ?></span><br><br>
					
					Password : <input type = "password" name = "passkey" value ='<?php echo htmlentities($passw)?>'> 
					<span class = "error"> <?php echo $passerr; ?></span><br><br>
				</fieldset>
			</form>
		   	<a href = "/var/www/html/myfiles/DBMSmp/browseflights.php">BROWSE FLIGHTS</a><br><br>
		   	<a href = "/var/www/html/myfiles/DBMSmp/welcomepage.php">BACK TO WELCOME PAGE</a>
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
