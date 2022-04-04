<?php  
	session_start();
	require './PHP/connect.php';
	require'./PHP/common_files.php';
	$ratingsQuery="SELECT `ratings` from `customer` WHERE `userid`=".$_SESSION['userid']."";
    $ratingResult = mysqli_query($connection, $ratingsQuery);
    $userRatings='';
    if(mysqli_num_rows($ratingResult) > 0){
        $ratingsRow = mysqli_fetch_assoc($ratingResult);
        $userRatings=$ratingsRow['ratings'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- <title>Collaborative Filtering</title> -->
	<style>
		body{
			overflow:hidden;
		}
		.card{
			width: 18rem;
		}
		.image-wrapper{
			object-fit: cover;
		}
		img{
			object-fit: contain;
		}
		/*.book-author{
		    white-space: nowrap;
		    overflow: hidden;
		    text-overflow: ellipsis; 
      	}*/
      	.card-title,.book-author{
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis; 
      }
	</style>
</head>
<body>
	<div class="spinner-border text-primary" id='spinner' role="status">
	  <span class="visually-hidden">Loading...</span>
	</div>
	<!-- <h3>Collaborative Filtering</h3> -->
	<div id="books" class="row d-block" style=" white-space: nowrap; overflow-x:auto;">
		
	</div>
	<!-- <button name="submit" disabled>Submit</button> -->
	<script src="./JS/collaborative.js"></script>
	<?php 
		// $userRatings=json_decode($userRatings);
	// echo(json_decode($userRatings))
		echo "<script>fetchBooks(".$_SESSION['userid'].",'".$userRatings."')</script>";
	 ?>
</body>
</html>