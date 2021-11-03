<?php 
	session_start();
	require './PHP/connect.php';
	require './PHP/common_files.php';
	$selectOrder='';
	$flag=0;
	$final_price=0;
	if(isset($_GET['id'])){
		$selectOrder="SELECT * FROM books WHERE book_id=".$_GET['id'];
		$flag=1;
	}else{
		$selectOrder="SELECT * FROM cart WHERE cust_id=".$_SESSION['userid'];
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="./CSS/checkout.css">
	<title>Order Page</title>
</head>
<body>
	<?php 
		require './PHP/header.php';
	 ?>
	 <div class="container my-5 px-5">
	     <div class="mb-4">
	         <h2>Confirm order and pay</h2> <!-- <span>please make the payment, after that you can enjoy all the features and benefits.</span> -->
	     </div>
	     
	     <div class="row mb-3">
	     	<div class="col-md-8">
	     		<div class="card p-3">
	     			<h6>ORDER DETAILS</h6>
		 		     <?php 
		 		     	$result = mysqli_query($connection, $selectOrder);
		 		     	if($flag==0){
		 	                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		 	                	
		 	                	$sql2="SELECT * FROM books WHERE book_id=".$row['book_id']."";
		 	                	$result2=mysqli_query($connection,$sql2) or die('Invalid query:');
		 	                	$row2 = mysqli_fetch_assoc($result2);
		 	                		$final_price+=$row2["cost"];
		 	                		echo
		 	                		'
	    				 		     <div class="d-flex my-2">
	    					 		     <div class="col-md-2 col-5 d-flex justify-content-center">
	    					 		         <img src="'.$row2["image_url"].'" class="" alt="Image" style=" max-height:8em; ">
	    					 		     </div>
	    					 		     <div class="col-md-8 col-7 border-bottom border-default">
	    					            	<div class="card border-0">
	    			                  			<div class="card-body">
	    				                    		<h6 class="card-title">'.$row2["original_title"].'</h6>
	    					                    	<span class="card-text d-block">&#8377;'.$row2["cost"].'</span>
	    					                    	<span class="card-text d-block"><b>Quantity: </b>'.$row["quantity"].'</span>
	    					                  	</div>
	    					                </div>
	    					            </div>
	    					        </div>
		 	                		';
		 	                }
		 		     	}else{
		 	                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		 	                		$final_price=$row["cost"];
		 	                		echo
		 	                		'
	    				 		     <div class="d-flex">
	    					 		     <div class="col-md-2 col-5 d-flex justify-content-center">
	    					 		         <img src="'.$row["image_url"].'" class="" alt="Image" style=" max-height:8em; ">
	    					 		     </div>
	    					 		     <div class="col-md-8 col-7 border-bottom border-default">
	    					            	<div class="card border-0">
	    			                  			<div class="card-body">
	    				                    		<h6 class="card-title">'.$row["original_title"].'</h6>
	    					                    	<span class="card-text d-block">&#8377;'.$row["cost"].'</span>
	    					                    	<span class="card-text d-block"><b>Quantity: </b>1</span>
	    					                  	</div>
	    					                </div>
	    					            </div>
	    					        </div>
		 	                		';
		 	                }	
		 		     	}
		 		     	
		 		     ?>
		 		     
	     		</div>
	     	</div>
	     	<div class="col-md-4">
	             <div class="card card-blue p-3 text-white mb-3"> <span>You have to pay</span>
	                 <div class="d-flex flex-row align-items-end mb-3">
	           
	                     <h1 class="mb-0 yellow">&#8377;<?php echo $final_price; ?></h1>
	                 </div> 

	                 <!-- <div class="hightlight"> <span>100% Guaranteed support and update for the next 5 years.</span> </div> -->
	             </div>
	         </div>
	     </div>
	     <div class="row">
	         <div class="col-md-8">
	             <div class="card p-3">
	                 <h6 class="text-uppercase">Payment details</h6>
	                 <?php 
				     	$sql_user = "SELECT * FROM customer WHERE  userid=". $_SESSION['userid'];
			            if($result_user = mysqli_query($connection, $sql_user)){
			                //$row = mysqli_fetch_all($result, MYSQLI_NUM);
			                while ($row_user = mysqli_fetch_array($result_user, MYSQLI_ASSOC)) {
			                	echo'
	                		    	<input type="text" name="name" class="form-control" required="required" value="'.$row_user["username"].'">
		                		    <div class="row">
		                		        <div class="col-md-6">
		                		            <div class="inputbox mt-3 mr-2"> <input type="text" name="name" class="form-control" required="required"> <i class="fa fa-credit-card"></i> <span>Card Number</span> </div>
		                		        </div>
		                		        <div class="col-md-6">
		                		            <div class="d-flex flex-row">
		                		                <div class="inputbox mt-3 mr-2"> <input type="text" name="name" class="form-control" required="required"> <span>Expiry</span> </div>
		                		                <div class="inputbox mt-3 mr-2"> <input type="text" name="name" class="form-control" required="required"> <span>CVV</span> </div>
		                		            </div>
		                		        </div>
		                		    </div>
		                		    <div class="mt-4 mb-4">
		                		        <h6 class="text-uppercase">Billing Address</h6>
		                		        <div class="row mt-3">
		                		            <div class="col-md">
		                		                <div class="inputbox mt-3 mr-2"> <input type="text" name="name" class="form-control" required="required"> <span>Address</span> </div>
		                		            </div>
		                		            <!-- <div class="col-md-6">
		                		                <div class="inputbox mt-3 mr-2"> <input type="text" name="name" class="form-control" required="required"> <span>City</span> </div>
		                		            </div> -->
		                		        </div>
		                		       <!--  <div class="row mt-2">
		                		            <div class="col-md-6">
		                		                <div class="inputbox mt-3 mr-2"> <input type="text" name="name" class="form-control" required="required"> <span>State/Province</span> </div>
		                		            </div>
		                		            <div class="col-md-6">
		                		                <div class="inputbox mt-3 mr-2"> <input type="text" name="name" class="form-control" required="required"> <span>Zip code</span> </div>
		                		            </div>
		                		        </div> -->
		                		    </div>
		                		</div>
		                		<div class="mt-2 mb-4 d-flex justify-content-between"> <button class="btn btn-success px-3">Confirm</button> </div>
			                	';
			                }
			            }
				     ?>
	                 
	         </div>
	         
	     </div>
	</div>

	 <?php 
	 	require './PHP/footer.php'; 
	 ?>
</body>
</html>