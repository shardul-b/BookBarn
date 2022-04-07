<!DOCTYPE html>
<html lang="en">
<?php 
	require('./PHP/connect.php');
	session_start();
	require('./PHP/common_files.php');
	if(!isset($_SESSION['userid'])){
        echo "<script> location.href='./login.php'; </script>";
    }
 ?>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Updates | BookBarn</title>
</head>
<body>
	<?php 
		require('./PHP/header.php');
		include("./PHP/error.php");
	 ?>
	 <div class="container-fluid">
	 	<h2>Pending Requests:</h2>
	<?php 

		// if(isset($_SESSION['userid'])){
		  // echo $_SESSION['userid'];  
		  $notifications="SELECT `offer_id`,`book_id`,`customer_id`,`status`,`start_date` from `rent_offers` WHERE `renter_id`='".$_SESSION['userid']."' AND `status`='pending'";

		  $notificationsResult = mysqli_query($connection, $notifications);
		  if (mysqli_num_rows($notificationsResult) > 0) {
		    
		    while($notificationsRow = mysqli_fetch_assoc($notificationsResult)) {
		    	//bookDetails
		      $bookDetails="SELECT `image_url`,`original_title` FROM `books_1` WHERE `book_id`='".$notificationsRow['book_id']."'";
		      $bookDetailsresult = mysqli_query($connection, $bookDetails);
		      $bookDetailsRow=mysqli_fetch_assoc($bookDetailsresult);
		      echo'
        		<div class="row py-3 border-bottom border-default">
		            <div class="col-md-2 col-5 d-flex justify-content-end ">
		                <img src="'.$bookDetailsRow["image_url"].'" class="" alt="Image" style=" max-width:8em; ">
		            </div>
		            
		            <div class="col-md-8 col-7 border border-default">
			            	
			            	<div class="card border-0">
	                  			<div class="card-body">
					                <a href="./book_desc.php"></a>
		                    		<h5 class="card-title">'.$bookDetailsRow["original_title"].'</h5>
		                    		<div class="dates">
		                    			<h6>From: '.$notificationsRow["start_date"].'</h6>
		                    			<span style="color: var(--bs-indigo);">'.$notificationsRow["status"].'</span>	
		                    		</div>	
			                    	<div class="d-flex py-2">
				                    	<form method="POST">
				                    		<input type="hidden" value="'.$notificationsRow["book_id"].'" name="rentbookId"/>
				                    		<input type="hidden" value="'.$notificationsRow["customer_id"].'" name="rentcustomerId"/>
				                    			
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

		// }else{
		// 	echo '<script>location.href="./login.php"</script>';
		// }
	 ?>
	</div>
	<hr/>
	<div class="container-fluid">
		<h2>Your Rental Requests:</h2>
		<?php 
		  $requestnotifications="SELECT `offer_id`,`book_id`,`customer_id`,`status`,`start_date` from `rent_offers` WHERE `customer_id`='".$_SESSION['userid']."'";

		  $requestnotificationsResult = mysqli_query($connection, $requestnotifications);
		  if (mysqli_num_rows($requestnotificationsResult) > 0) {
		  	  
		    while($requestnotificationsRow = mysqli_fetch_assoc($requestnotificationsResult)) {
		    	//bookDetails
		      $requestbookDetails="SELECT `image_url`,`original_title` FROM `books_1` WHERE `book_id`='".$requestnotificationsRow['book_id']."'";
		      $requestbookDetailsresult = mysqli_query($connection, $requestbookDetails);
		      $requestbookDetailsRow=mysqli_fetch_assoc($requestbookDetailsresult);	
		      echo'
        		<div class="row py-3 border-bottom border-default">
		            <div class="col-md-2 col-5 d-flex justify-content-end ">
		                <img src="'.$requestbookDetailsRow["image_url"].'" class="" alt="Image" style=" max-width:8em; ">
		            </div>
		            
		            <div class="col-md-8 col-7 border border-default">
			            	
			            	<div class="card border-0">
	                  			<div class="card-body">
					                <a href="./book_desc.php"></a>
		                    		<h5 class="card-title">'.$requestbookDetailsRow["original_title"].'</h5>
		                    		<div class="dates">
		                    			<h6>From: '.$requestnotificationsRow["start_date"].'</h6>	
		                    			<span style="color: var(--bs-indigo);">'.$requestnotificationsRow["status"].'</span>
		                    		</div>	
			                    	<!--<div class="d-flex py-2">
				                    	<form method="POST">	
				                    		
				                        	<button class="btn btn-success" name="confirm"><b>Confirm</b></button>
				                        	<button class="btn btn-danger" name="reject"><b>Reject</b></button>
				                  		</form>	
			                  		</div>-->
			                  	</div>
			                </div>
		            </div>
		        </div>';
		      	
		    }
		  } else {
		    echo "0 results";
		  }
	 ?>
	</div>
	<hr/>
	<div class="container-fluid">
		<h2>Requests History for your books:</h2>
		<?php 
		  $requestnotifications="SELECT `offer_id`,`book_id`,`customer_id`,`status`,`start_date` from `rent_offers` WHERE `renter_id`='".$_SESSION['userid']."'";

		  $requestnotificationsResult = mysqli_query($connection, $requestnotifications);
		  if (mysqli_num_rows($requestnotificationsResult) > 0) {
		  	  
		    while($requestnotificationsRow = mysqli_fetch_assoc($requestnotificationsResult)) {
		    	//bookDetails
		      $requestbookDetails="SELECT `image_url`,`original_title` FROM `books_1` WHERE `book_id`='".$requestnotificationsRow['book_id']."'";
		      $requestbookDetailsresult = mysqli_query($connection, $requestbookDetails);
		      $requestbookDetailsRow=mysqli_fetch_assoc($requestbookDetailsresult);	
		      echo'
        		<div class="row py-3 border-bottom border-default">
		            <div class="col-md-2 col-5 d-flex justify-content-end ">
		                <img src="'.$requestbookDetailsRow["image_url"].'" class="" alt="Image" style=" max-width:8em; ">
		            </div>
		            
		            <div class="col-md-8 col-7 border border-default">
			            	
			            	<div class="card border-0">
	                  			<div class="card-body">
					                <a href="./book_desc.php"></a>
		                    		<h5 class="card-title">'.$requestbookDetailsRow["original_title"].'</h5>
		                    		<div class="dates">
		                    			<h6>From: '.$requestnotificationsRow["start_date"].'</h6>	
		                    			<span style="color: var(--bs-indigo);">'.$requestnotificationsRow["status"].'</span>
		                    		</div>	
			                    	<!--<div class="d-flex py-2">
				                    	<form method="POST">	
				                    		
				                        	<button class="btn btn-success" name="confirm"><b>Confirm</b></button>
				                        	<button class="btn btn-danger" name="reject"><b>Reject</b></button>
				                  		</form>	
			                  		</div>-->
			                  	</div>
			                </div>
		            </div>
		        </div>';
		      	
		    }
		  } else {
		    echo "0 results";
		  }
	 ?>
	</div>
	 <?php 
	 	if(isset($_POST['confirm'])){
	 		print_r($_POST);
	 		$rentBookId=$_POST['rentbookId'];
	 		$rentCustomerId=$_POST['rentcustomerId'];

	 		$updateStatus="UPDATE `rent_offers` SET `status`='confirm' WHERE book_id='".$rentBookId."' AND `renter_id`='".$_SESSION['userid']."' AND `customer_id`='".$rentCustomerId."'";
	 		if (mysqli_query($connection, $updateStatus)) {
	 			$updateQuantity="UPDATE `rent` SET `quantity`=0 WHERE `rent_book_id`='".$rentBookId."' AND `user_id`= '".$_SESSION['userid']."'";
	 			// echo 'Rent Book'.$rentBookId;
	 			// echo $updateQuantity;
	 			if(mysqli_query($connection, $updateQuantity)){
	 				echo'<script>document.getElementById("alerts").innerHTML=`
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                          Success
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    `;</script>';
                    echo'<script type="text/javascript">
		                	location.href="./redirect.php?backTo=updates.php";
		                </script>'; 
	 			}else{
	 				echo mysqli_error($connection);
	 				echo'<script>document.getElementById("alerts").innerHTML=`
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          Failed to update Rent details.
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    `;</script>';
	 			}
	 		} else {
	 			echo mysqli_error($connection);
	 		  echo'<script>document.getElementById("alerts").innerHTML=`
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                          Failed to update Status
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    `;</script>';
	 		}

	 	}elseif(isset($_POST['reject'])){
	 		$rentBookId=$_POST['rentbookId'];
	 		$rentCustomerId=$_POST['rentcustomerId'];
	 		$updateStatus="UPDATE `rent_offers` SET `status`='rejected' WHERE book_id='".$rentBookId."' AND `renter_id`='".$_SESSION['userid']."' AND `customer_id`='".$rentCustomerId."'";
	 		if (mysqli_query($connection, $updateStatus)) {
	 			echo'<script>document.getElementById("alerts").innerHTML=`
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                          Success
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    `;</script>';
                  //   echo'<script type="text/javascript">
		                // 	location.href="./redirect.php?backTo=updates.php";
		                // </script>';
	 		}else{
	 			echo mysqli_error($connection);
	 			echo'<script>document.getElementById("alerts").innerHTML=`
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                          Failed to update Status
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    `;</script>';
	 		}
	 	}

	  ?>

	 <!-- 
		Update status value
	  -->
</body>
</html>