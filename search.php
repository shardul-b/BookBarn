<?php
	 require('./PHP/connect.php');
	 session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="./bootstrap-5.0.2-dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<title>Search</title>
	<!-- <link rel="stylesheet" href="assets/fonts/ionicons.min.css"><link rel="stylesheet" href="assets/css/Brands.css"><link rel="stylesheet" href="assets/css/Projects-Horizontal.css"><link rel="stylesheet" href="assets/css/styles.css"> -->
	<style>
		.flex-wrapper {
			display: flex;
			flex-direction: column;
		    justify-content: space-between;
		}
	</style>
</head>

<body>
<?php  require('./PHP/header.php'); ?>
<div class="flex-wrapper">
	<div class="container">		
		<h2>Search Results: </h2>
	<?php
			if(isset($_GET['value'])){
				$searchterm=$_GET['value'];	
				$sql="SELECT * FROM books WHERE original_title LIKE '%$searchterm%' OR categories='$searchterm'";
			    $result=mysqli_query($connection,$sql);
				$rating='';
				if(mysqli_num_rows($result)>0){		
					while($row = mysqli_fetch_assoc($result)){
						switch (intval($row['average_rating'])){
							case 1:
								$rating='
								<i class="fas fa-star" style="color: #ffcc33;"></i>
								<i class="far fa-star" style="color: #ffcc33;"></i>
								<i class="far fa-star" style="color: #ffcc33;"></i>
								<i class="far fa-star" style="color: #ffcc33;"></i>
								<i class="far fa-star" style="color: #ffcc33;"></i>';
								break;
							case 2:
								$rating='
								<i class="fas fa-star" style="color: #ffcc33;"></i>
								<i class="fas fa-star" style="color: #ffcc33;"></i>
								<i class="far fa-star" style="color: #ffcc33;"></i>
								<i class="far fa-star" style="color: #ffcc33;"></i>
								<i class="far fa-star" style="color: #ffcc33;"></i>';
								break;
							case 3:
								$rating='
								<i class="fas fa-star" style="color: #ffcc33;"></i>
								<i class="fas fa-star" style="color: #ffcc33;"></i>
								<i class="fas fa-star" style="color: #ffcc33;"></i>
								<i class="far fa-star" style="color: #ffcc33;"></i>
								<i class="far fa-star" style="color: #ffcc33;"></i>';
								break;
							case 4:
								$rating='
								<i class="fas fa-star" style="color: #ffcc33;"></i>
								<i class="fas fa-star" style="color: #ffcc33;"></i>
								<i class="fas fa-star" style="color: #ffcc33;"></i>
								<i class="fas fa-star" style="color: #ffcc33;"></i>
								<i class="far fa-star" style="color: #ffcc33;"></i>';
								break;
							case 5:
								$rating='
								<i class="fas fa-star" style="color: #ffcc33;"></i>
								<i class="fas fa-star" style="color: #ffcc33;"></i>
								<i class="fas fa-star" style="color: #ffcc33;"></i>
								<i class="fas fa-star" style="color: #ffcc33;"></i>
								<i class="fas fa-star" style="color: #ffcc33;"></i>';
								break;
							default:
								$rating='';
								break;
						}				
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
					                    	<div class="rating">
					                    		'.$rating.'
				                    		</div>
					                    	<span class="card-text d-block">&#8377;'.$row["cost"].'</span>
					                   		<span style="color: var(--bs-indigo);">In Stock</span>
					                    	<div class="d-flex py-2">
					                        	<a href="book_desc.php?id='.$row["book_id"].'" class="btn btn-primary"><b>VIEW PRODUCT</b></a>
					                        								
					                        	<!--<a href="#" class="btn btn-success ms-2">BUY NOW</a>-->
					                  			
					                  		</div>
					                  	</div>
					                </div>
				            </div>
				        </div>';
				   	}
				}else{
				 	echo "<p class='mb-5'>No Products found!</p>";
				}

			}else{
				echo"Not Found";
			}   
	       ?>
	   </div>
       <?php include'./PHP/footer.php' ?>
</div>
    
    <script src="./bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js">
    </script>

</body>
</html>