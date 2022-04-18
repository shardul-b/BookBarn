<?php  
	session_start();
	require './PHP/connect.php';
	require'./PHP/common_files.php';
	$bookTitle='';
	if(isset($_GET['title'])){
		$bookTitle=$_GET['title'];
	}

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
	<h5>Books related to this title: </h5>

	<!-- <div class="container my-5"> -->
		<div class="spinner-border text-primary" id='spinner' role="status">
           <span class="visually-hidden">Loading...</span>
         </div>
        <div id="books" class="row d-block" style=" white-space: nowrap; overflow-x:auto;">
	<!-- <div  class="ms-2 mt-1">
		
	</div> -->
		</div>
	<!-- </div> -->
	<!-- <button name="submit" disabled>Submit</button> -->

	<script src="./JS/content.js"></script>
	<?php 
		echo "<script>fetchBooks('".$bookTitle."')</script>";
	 ?>
</body>
</html>