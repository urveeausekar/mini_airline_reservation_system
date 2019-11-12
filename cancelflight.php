<?php
	
	include_once 'include_ars_db.php';
	$adminid = " ";
	
	$pliderr = " ";
	$dateerr = " ";
	$scityerr = " ";
	$dcityerr = " ";
	$sconterr = " ";
	$dconterr = " ";
	$timeerr = " ";
	$rderr = " ";
	$srcaperr = " ";
	$destaperr = " ";
	/*$fnerr = " ";
	$mnerr = " ";
	$lnerr = " ";*/
	$numoferr = 0;
	
	$notify = " ";
	$plane_id = NULL;
	$date = NULL;
	$srccity = NULL;
	$destcity = NULL;
	$srccountry = NULL;
	$destcountry = NULL;
	$dept_time = NULL;
	$srcap = NULL;
	$destap = NULL;
	/*$fname = NULL;
	$mname = NULL;
	$lname = NULL;*/
	
	
	
	if(isset($_POST['submit1'])){
		$plane_id = $_POST['plane_id'];
		$date = $_POST['date'];
		$srccity = $_POST['srccity'];
		$destcity = $_POST['destcity'];
		$srccountry = $_POST['srccountry'];
		$destcountry = $_POST['destcountry'];
		$dept_time = $_POST['dept_time'];
		$destap = $_POST['destap'];
		$srcap = $_POST['srcap'];
		
		if(empty($plane_id)){
			$pliderr = "Can't leave plane id empty.";
			$numoferr++;
		}
		
		if(empty($date)){
			$dateerr = "Please fill date field.";
			$numoferr++;
		}else if(strlen($date) != 10){
			$dateerr = "Please enter date in the prescribed format only. Use '-' as a separator";
			$numoferr++;
		}
		
		if(empty($srccity)){
			$scityerr = "Please fill source city name.";
			$numoferr++;
		}else{
			if(!preg_match('/^[a-zA-Z]*$/',$srccity)){
				$scityerr = "Please enter valid source city name consisting of only alphabets";
				$numoferr++;
			}
		}
		
		if(empty($destcity)){
			$dcityerr = "Please fill destination city name.";
			$numoferr++;
		}else{
			if(!preg_match('/^[a-zA-Z]*$/',$destcity)){
				$dcityerr = "Please enter valid destinaion city name consisting of only alphabets";
				$numoferr++;
			}
		}
		
		if(empty($srccountry)){
			$sconterr = "Please fill source country name.";
			$numoferr++;
		}
		else{
			if(!preg_match('/^[a-zA-Z]*$/',$srccountry)){
				$sconterr = "Please enter valid source country name consisting of only alphabets";
				$numoferr++;
			}
		}
		
		
		if(empty($destcountry)){
			$dconterr = "Please fill destination country name.";
			$numoferr++;
		}
		else{
			if(!preg_match('/^[a-zA-Z]*$/',$srccity)){
				$dconterr = "Please enter valid destination country name consisting of only alphabets";
				$numoferr++;
			}
		}
		
		if(empty($dept_time)){
			$timeerr = "Please fill departure time";
			$numoferr++;
		}
		else if(!preg_match("/^(?:2[0-4]|[01][1-9]|10):([0-5][0-9]):([0-5][0-9])$/",$dept_time)){
			$timeerr = "Please enter valid time";
			$numoferr++;
		}
		
		if(empty($srcap)){
			$srcaperr = "Please fill source airport";
			$numoferr++;
		}
		
		if(empty($destap)){
			$destaperr = "Please fill destination airport";
			$numoferr++;
		}
		
		
		if($numoferr == 0){
			$cancel_flight = "delete from flight where plane_id = '$plane_id' and src IN (select a_id from airport where a_name = '$srcap' and city = '$srccity' and country = '$srccountry' )  and dest IN(select a_id from airport where a_name = '$destap' and city = '$destcity' and country = '$destcountry') and dateofflight = '$date' and dept_time = '$dept_time'";
			$res = $conn->query($cancel_flight);
			if($res)
				$notify = "Deletion Done!";
		}
		
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
		  	<h1>CANCEL FLIGHTS</h1>
				<br><br>
			<span class = "error">All</span> details must be entered.<br><br>	
			<fieldset>
			<form method = "POST">
				
				Plane ID :<input type = "text" name = "plane_id" value ='<?php echo htmlentities($plane_id)?>'>
				<span class = "error"> <?php echo $pliderr; ?></span><br><br>
				<span class = "error">Please enter date in format yyyy-mm-dd</span><br>	
				Date :<input type = "text" name = "date" value ='<?php echo htmlentities($date)?>'>
				<span class = "error"> <?php echo $dateerr; ?></span><br><br>
				
				Source City :<input type = "text" name = "srccity" value ='<?php echo htmlentities($srccity)?>'>
				<span class = "error"> <?php echo $scityerr; ?></span><br><br>
				
				Destination City :<input type = "text" name = "destcity" value ='<?php echo htmlentities($destcity)?>'>
				<span class = "error"> <?php echo $dcityerr; ?></span><br><br>
				
				From Airport : <input type = "text" name = "srcap" value ='<?php echo htmlentities($srcap)?>'>
				<span class = "error"> <?php echo $srcaperr; ?></span><br><br>
				
				Source Country :<input type = "text" name = "srccountry" value ='<?php echo htmlentities($srccountry)?>'>
				<span class = "error"> <?php echo $sconterr; ?></span><br><br>
				
				Destination Country :<input type = "text" name = "destcountry"value ='<?php echo htmlentities($destcountry)?>'>
				<span class = "error"> <?php echo $dconterr; ?></span><br><br>
				
				To Airport : <input type = "text" name = "destap" value ='<?php echo htmlentities($destap)?>'>
				<span class = "error"> <?php echo $destaperr; ?></span><br><br>
				
				Departure Time :<input type = "text" name = "dept_time"value ='<?php echo htmlentities($dept_time)?>'>
				<span class = "error"> <?php echo $timeerr; ?></span><br><br>
				
				<input type = "submit" name = "submit1" value = "Cancel Flight" ><br><br>
			</form>
			<h2><?php echo $notify;?></h2>
			<br><br>
			</fieldset>
			<a href = "logout.php">LOG OUT</a><br><br>
			<a href = "adminlogin.php"> BACK TO ADMIN PAGE</a><br><br>
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
