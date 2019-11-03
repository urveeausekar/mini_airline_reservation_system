<?php
	//declaring variable for checking errors
	$fcityerr = " ";
	$fconterr = " ";
	$tcityerr = " ";
	$tconterr = " ";
	$derr = " ";
	$numoferr = 0;
	//fetching variables 
	$fromcity = NULL;
	$tocity = NULL;
	$fromcountry = NULL;
	$tocountry = NULL;
	$dateofflight = NULL;
	
	if(isset($_POST['submit'])){
		$fromcity = $_POST['srccity'];
		
		if(empty($_POST['srccity'])){
			$fcityerr = "Please enter source city";
			$numoferr++;
		}else{
			if(!preg_match('/^[a-zA-Z]*$/',$fromcity)){
				$fcityerr = "Please enter valid from city name consisting of only alphabets";
				$numoferr++;
			}
		}
		
		
		$fromcountry = $_POST['srccountry'];
		if(empty($_POST['srccountry'])){
			$fconterr = "Please enter source country";
			$numoferr++;
		}else{
			if(!preg_match('/^[a-zA-Z]*$/',$fromcountry)){
				$fconterr = "Please enter valid from country name consisting of only alphabets";
				$numoferr++;
			}
		}
		
		$tocity = $_POST['destncity'];
		if(empty($_POST['destncity'])){
			$tcityerr = "Please enter destination city";
			$numoferr++;
		}else{
			if(!preg_match('/^[a-zA-Z]*$/',$tocity)){
				$tcityerr = "Please enter valid destination city name consisting of only alphabets";
				$numoferr++;
			}
		}
		
		
		$tocountry = $_POST['destncountry'];
		if(empty($_POST['destncountry'])){
			$tconterr = "Please enter destination country";
			$numoferr++;
		}else{
			if(!preg_match('/^[a-zA-Z]*$/',$tocountry)){
				$tconterr = "Please enter valid destination country name consisting of only alphabets";
				$numoferr++;
			}
		}
		
		$dateofflight = $_POST['dateofflight'];
		if(empty($_POST['dateofflight'])){
			$derr = "Please enter date of flight";
			$numoferr++;
		}
	}
	
	/*
		1.Now we have details needed to search the database. So open connection, use prepared statements and
		search the database for flights as per data. 
		2.Find number of flights found using $rowcount=mysqli_num_rows($result);. 
		If num = 0, apologise. Else if num > 0 then;
			make a dynamic page called flights.php in the following way:
				1. copy file filghtsprefix.php to flights.php using copy. 
				2. Now write every row of query result in its own form .
				   The form input type = text should have no borders (see https://stackoverflow.com/questions/12255198/hide-border-in-html-form-or-input) and
				   should have 1 book button (submit button with name book).
				3. Now copy contents of file flightsuffix.php using file_put_contents and flag append
				4. Now redirect to this flights.php. see https://stackoverflow.com/questions/353803/redirect-to-specified-url-on-php-script-completion
				
				5. Now user should be able to see all options here. When user presses book, check if 
				   they are logged in. If not logged in, make them log in.
				   Once they are logged in, take them to payment gateway. 
				6. Once they pay, take them to their user page and show details of booked flights there.
	
	*/
?>


<html>
	<head>
		<title>BrowseFlights</title>
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
			  height: 120%; /* Should be removed. Only for demonstration */
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
  				width : 400px;
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
		  	<h1>Browse Flights</h1>
		  	<h3>Please Enter <span class = "error">All</span> the Required Details</h3>
		  	<fieldset>
		  	<form method = "POST">
		  		From City : <input type = "text" name = "srccity" value ='<?php echo htmlentities($fromcity)?>'>
		  		<span class = "error"> <?php echo $fcityerr; ?></span><br><br>
		  		
		  		From Country : <input type = "text" name = "srccountry" value ='<?php echo htmlentities($fromcountry)?>'>
		  		<span class = "error"> <?php echo $fconterr; ?></span><br><br>
		  		
		  		To City : <input type = "text" name = "destncity" value ='<?php echo htmlentities($tocity)?>'>
		  		<span class = "error"> <?php echo $tcityerr; ?></span><br><br>
		  		
		  		To Country : <input type = "text" name = "destncountry" value ='<?php echo htmlentities($tocountry)?>'>
		  		<span class = "error"> <?php echo $tconterr; ?></span><br><br>
		  		
		  		Date : <input type = "date" name = "dateofflight" value ='<?php echo htmlentities($dateofflight)?>'>
		  		<span class = "error"> <?php echo $derr; ?></span><br><br>
		  		
		  		<input type = "submit" name = "submit" value = "Submit!">
		  		
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
