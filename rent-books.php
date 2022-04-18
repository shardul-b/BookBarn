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
	<title>Books on rent</title>
	<style>
		.flex-wrapper {
			display: flex;
			flex-direction: column;
		    justify-content: space-between;
		}
	</style>
</head>
<body>
	<?php 
		require './PHP/header.php';
	 ?>
	 <div class="flex-wrapper">
	 	<div class="container">
	 		<h2>Books Available on rent: </h2>
	 		<?php
				$rentQuery="SELECT * FROM `rent`";
				$rentResult=mysqli_query($connection,$rentQuery);
				if(mysqli_num_rows($rentResult)>0){		
					while($rentRow = mysqli_fetch_assoc($rentResult)){
						$sql="SELECT * FROM books WHERE book_id =".$rentRow['rent_book_id'];
					    $result=mysqli_query($connection,$sql);
						if(mysqli_num_rows($result)>0){		
							while($row = mysqli_fetch_assoc($result)){			
							echo'
						        <div class="row py-3 border-bottom border-default">
						            <div class="col-md-2 col-5 d-flex justify-content-end ">
						                <img src="'.$row["image_url"].'" class="" alt="Image" style=" max-width:8em; ">
						            </div>
						            
						            <div class="col-md-8 col-7 border border-default">
							            	<div class="card border-0">
					                  			<div class="card-body">
									                <a href="./book_desc.php"></a>
						                    		<h5 class="card-title">'.$row["original_title"].'</h5>
							                    	<div class="period">
							                    		<p>'.$rentRow["period"].' days</p>
						                    		</div>
						                    		<span class="card-text d-block"></span>
							                    	<span class="card-text d-block">&#8377;'.$rentRow["cost"].' per day</span>
							                    	<div class="d-flex py-2">
							                        	<a href="book_desc.php?id='.$row["book_id"].'" class="btn btn-primary"><b>VIEW PRODUCT</b></a>
							                  		</div>
							                  	</div>
							                </div>
						            </div>
						        </div>';
						   	}
						}else{
							echo mysqli_error($connection);
						}

					}
				}else{
				 	echo "<p class='mb-5'>No Products found!</p>";
				}			
				   
	       ?>
	 	</div>
	 <?php 
	 	require './PHP/footer.php';
	  ?>
	</div>
</body>
</html>