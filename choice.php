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
	<title>Book Choice</title>
</head>
<body>
	<?php 
		require './PHP/header.php';
	?>
	<form method="post">
	<div id="books" class="ms-2 mt-1">
		<h2>Please Rate the Following Books:</h2>
		<!-- <h2>This is help us to recommend similar books</h2> -->
	</div>
	<button name="submit" class="ms-2 mt-1" id="submit-ratings">Submit</button>
	</form>
	<?php 
		require './PHP/footer.php';
	 ?>
	<script src="./JS/book_choice.js"></script>
</body>
</html>

<?php
	$ratingsObj=[];

	$outputArr=[];
	if(isset($_POST['submit'])){

		if(!empty($_POST['rating_value'])) {
			foreach($_POST['rating_value'] as $selected) {
				$ratings_arr=explode(':', $selected);

				$ratingsObj["user_id"]=$_SESSION['userid'];
				$ratingsObj["book_id"]=$ratings_arr[0];
				$ratingsObj["rating"]=$ratings_arr[1];
				array_push($outputArr, json_encode($ratingsObj));
			}

			// array_push($outputArr, json_encode($ratingsObj));
			// $ratingStr="".$outputArr."";
			// $ratingsStr=json_encode($ratingsObj);
			// print_r(json_encode($outputArr));
			$query = "UPDATE customer  SET ratings='".json_encode($outputArr)."' WHERE userid=".$_SESSION['userid']."";
			echo($query);
            $result = mysqli_query($connection,$query);
            if($result){
                echo'
                <script>
                  location.href="./index.php?rating_success=true";
                </script>';   
            }else{
                echo(mysqli_error($connection));
            }
			// echo $outputArr;
		}
		else{
			echo "<b>Please Select Atleast One Option.</b>";
		}
	}
	?>
