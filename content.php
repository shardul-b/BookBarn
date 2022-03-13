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
	<style>
		body{
			overflow:hidden;
		}
		.card{
			width: 12rem;
		}
		.image-wrapper{
			object-fit: cover;
		}
		img{
			object-fit: contain;
		}
		.card-title,.book-author{
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis; 
      }
	</style>
</head>
<body>
	<!-- <div class="container my-5"> -->
        <div id="books" class="row d-block" style=" white-space: nowrap; overflow-x:auto; ">
	<!-- <div  class="ms-2 mt-1">
		
	</div> -->
		</div>
	<!-- </div> -->
	<!-- <button name="submit" disabled>Submit</button> -->
	<script src="./JS/content.js"></script>
</body>
</html>