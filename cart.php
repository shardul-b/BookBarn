<?php 
	session_start();
 	require './PHP/common_files.php';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Cart</title>
	<style>
		.flex-wrapper {
			display: flex;
			flex-shrink: 0;
			flex-grow: 1;
			flex-direction: column;
		    justify-content: space-between;
		}
	</style>
</head>
<body>
	<?php 
		require './PHP/connect.php';
		require './PHP/header.php';
	 ?>
	<div class="flex-wrapper">
	<div class="cart">
		<div class="container">
			<h2 class="my-3">My Cart</h2>
			<div class="row my-3">
				<?php 
					$sql="SELECT * FROM `cart` WHERE Cust_id=".$_SESSION['userid'];
					 if($result = mysqli_query($connection, $sql)){
					 	if(mysqli_num_rows($result)>0){
						 	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
						 		
						 		$sql2="SELECT * FROM books WHERE book_id=".$row['book_id']."";
	                            $result2=mysqli_query($connection,$sql2) or die('Invalid query:');
	                            $row2 = mysqli_fetch_assoc($result2);
						 		echo'
			 					<div class="col-8">
			 						<div class="card my-2">
			 			                <div class="row">
			 			                    <div class="col-md-3">
			 			                      <img src="'.$row2["image_url"].'" alt="Image" class="img-fluid rounded-start" style="object-fit: contain; width:8em;">
			 			                    </div>
			 			                    <div class="col-md-9">
			 			                      <div class="card-body">
			 			                        <h5 class="card-title">'.$row2["original_title"].'</h5>
			 			                        <p class="card-text">'.$row["quantity"].'</p>
			 			                        <p class="card-text">&#8377;'.$row2["cost"].'</p>
			 			                        <a href="./cart.php?id='.$row["book_id"].'&cart_id='.$row["cart_id"].'" class="btn btn-outline-danger"><b>Remove</b></a>
			 			                      </div>
			 			                    </div>
			 			                 </div>
			 						</div>
			 					</div>

						 		';
							 	
							 	
							 	// echo '<a class="btn btn-success" href="./checkout.php">Confirm Order</button>';
						 	}
						 	echo '
						 	 <div class="col-8">
						 	 	<a class="btn btn-success" href="./checkout.php">Confirm Order</a>
						 	 </div>
						 	 	';
					 	}else{
					 		echo("Empty Cart");
					 	}
					 	
					 }else{
					 	echo "Error";
					 }


				?>
				
	
			
			</div>
		</div>
	</div>
	<?php 
		include './PHP/footer.php';
	 ?>
	 </div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
<?php 
	if(isset($_GET['id'])){
		$sql= "DELETE FROM cart WHERE cust_id=". $_SESSION['userid'] ." AND book_id=".$_GET['id'] ." AND cart_id=".$_GET['cart_id'];
		$result=mysqli_query($connection,$sql) or die('Invalid query:'.mysqli_error($connection));
		echo("<script>location.href='./cart.php';</script>");
	}
?>
</html>