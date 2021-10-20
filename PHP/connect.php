<?php
	$connection=connect();
	function connect(){
		$servername = "localhost";
		$username = "root";
		$password = "";
		$database="BookBarn";

		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $database);
		if (!$conn) {
	  		die("Connection failed: " . mysqli_connect_error());
		}else{
			return $conn;
		}	
		
	}
	// Check connection
	
	// echo "Connected successfully";
?> 