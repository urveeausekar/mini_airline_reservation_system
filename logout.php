<?php
	include_once 'include_ars_db.php';
	session_start();
	if($_SESSION['loggedin'] == "yes"){
		unset($_SESSION['loggedin']);
		unset($_SESSION['loginid']);
		unset($_SESSION['type']);
	}
	
	session_unset();
	session_destroy();
	
	header("Location:http://localhost/myfiles/DBMSmp/welcomepage.php");
	
		
?>
