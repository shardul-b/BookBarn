<!DOCTYPE html>
<html lang="en">
<?php 
	require('./PHP/connect.php');
	session_start();
	require('./PHP/common_files.php');
 ?>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Updates | BookBarn</title>
</head>
<body>
	<?php 
		require('./PHP/header.php');
	 ?>
	<?php 

		if(isset($_SESSION['userid'])){
		  // echo $_SESSION['userid'];  
		  $notifications="SELECT `offer_id`,`book_id`,`customer_id`,`status` from `rent_offers` WHERE `renter_id`='".$_SESSION['userid']."' AND `status`='false'";

		  $notificationsResult = mysqli_query($connection, $notifications);
		  if (mysqli_num_rows($notificationsResult) > 0) {
		    while($notificationsRow = mysqli_fetch_assoc($notificationsResult)) {
		    	//bookDetails
		      $bookDetails="SELECT `book_image`,`original_title` FROM `books` WHERE `book_id`='".$notificationsResult['book_id']."'";
		      	
		      echo'
        		<div class="row py-3 border-bottom border-default">
		            <div class="col-md-2 col-5 d-flex justify-content-end ">
		                <img src="'.$["image_url"].'" class="" alt="Image" style=" max-width:8em; ">
		            </div>
		            
		            <div class="col-md-8 col-7 border border-default">
			            	
			            	<div class="card border-0">
	                  			<div class="card-body">
					                <a href="./book_desc.php"></a>
		                    		<h5 class="card-title">'.$row["original_title"].'</h5>
		                    		<div class="dates">
		                    			<h2>From://from date To://to date</h2>	
		                    		</div>	
			                    	<div class="d-flex py-2">
				                    	<form method="POST">	
				                        	<button class="btn btn-success" name="confirm"><b>Confirm</b></button>
				                        	<button class="btn btn-danger" name="reject"><b>Reject</b></button>
				                  		</form>	
			                  		</div>
			                  	</div>
			                </div>
		            </div>
		        </div>';
		      	
		    }
		  } else {
		    echo "0 results";
		  }
		}else{
			echo '<script>location.href="./login.php"</script>';
		}
	 ?>
	 <!-- 
		Update status value
		Display fetched details
	  -->
</body>
</html>