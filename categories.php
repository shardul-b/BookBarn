<?php 
	session_start();
	require './PHP/connect.php';
	require './PHP/common_files.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Genres</title>
</head>
<body>
	<?php 
		require './PHP/header.php';
	?>
	
	<div class="container my-2">
		<h3>Choose your favorite Genre:</h3> 	
		<div class="categories">
			
		</div>
	</div>
	<script src="./JS/categories.js"></script>
</body>
</html>