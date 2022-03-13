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
	<!-- <title>Collaborative Filtering</title> -->
</head>
<body>
	<h3>Collaborative Filtering</h3>
	<div id="books" class="row d-block" style=" white-space: nowrap; overflow-x:auto;">
		
	</div>
	<!-- <button name="submit" disabled>Submit</button> -->
	<script src="./JS/collaborative.js"></script>
</body>
</html>