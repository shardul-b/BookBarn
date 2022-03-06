<?php  
	session_start();
	require './PHP/connect.php';
	require'./PHP/common_files.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Content Based Recommendation</title>
</head>
<body>
	
	<?php 
		require './PHP/header.php';
	?>
	<h3>Content Based Recommendation</h3>
	<div id="books" class="ms-2 mt-1">
		
	</div>
	<!-- <button name="submit" disabled>Submit</button> -->
	<script src="./JS/content.js"></script>
</body>
</html>