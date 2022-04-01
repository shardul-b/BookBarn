<?php 
	session_start();
	require './PHP/common_files.php';
	require './PHP/connect.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Funds</title>
</head>
<body>
	
	<?php 
		require './PHP/header.php';
	?>
	<?php 
		require'./PHP/error.php';
	 ?>
	<!-- <div class="alert alert-danger alert-dismissible fade show" role="alert">
	  Please Enter a valid amount!
	  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div> -->
	<div class="container">
		<?php 
			if(isset($_GET['action'])){
				if($_GET['action']=="withdraw"){
					echo '
						<h1> Withdraw Funds </h1>
						<hr/>
						<form method="POST">
							<div class="mb-3 col-sm-5">
							  <label for="withdraw-amount" class="form-label">Enter amount to withdraw</label>
							  <input type="number" min="0.0" step="0.01" class="form-control" name="withdraw-amount" id="withdraw-amount" placeholder="0.0">
							</div>
							<button type="submit" class="btn btn-success" name="withdraw-submit">Confirm</button>	
							<a href="./account.php" class="btn btn-primary">Back</a>
						</form>

					';
				}else{
					echo '
						<h1> Add Funds </h1>
						<hr/>
						<form method="POST">
							<div class="mb-3 col-sm-5">
							  <label for="add-amount" class="form-label">Enter amount to add</label>
							  <input type="number" min="0.0" step="0.01" class="form-control" name="add-amount" id="add-amount" placeholder="0.0">
							</div>
							<button type="submit" class="btn btn-success" name="add-submit">Confirm</button>	
							<a href="./account.php" class="btn btn-primary">Back</a>
						</form>

					';
				}
			}
		 ?>
	</div>
	<?php 
		require './PHP/footer.php';
	 ?>
	 <?php 
	 	$updateFunds='';
	 	$fundsSQL="SELECT `funds` FROM `customer` WHERE `userid`=".$_SESSION['userid']."";
	 	$fundsResult=mysqli_query($connection,$fundsSQL);
	 	$fundsRow=mysqli_fetch_assoc($fundsResult);
	 	if(isset($_POST['withdraw-submit'])){
	 		$amount=floatval($_POST['withdraw-amount']);
	 		print_r($amount<=$fundsRow['funds']?'true':'false');
	 		if($amount<=$fundsRow['funds'] && $amount>=1){
	 			$amount=$fundsRow['funds']-$amount;
	 			$updateFunds="UPDATE `customer` SET `funds`=".$amount." WHERE `userid`=".$_SESSION['userid']."";
	 			if (mysqli_query($connection, $updateFunds)) {
	 			  echo '<script>document.getElementById("alerts").innerHTML=`
	 					<div class="alert alert-success alert-dismissible fade show" role="alert">
	 					  Success!!
	 					  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	 					</div>
	 				`;</script>';
	 			} else {
	 			  echo "Error updating record: " . mysqli_error($conn);
	 				echo '<script>document.getElementById("alerts").innerHTML=`
	 					<div class="alert alert-danger alert-dismissible fade show" role="alert">
	 					  Error Updating Record.
	 					  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	 					</div>
	 				`;</script>';
	 			}

	 		}else{
	 			echo 
	 			'
	 				<script>document.getElementById("alerts").innerHTML=`
	 					<div class="alert alert-danger alert-dismissible fade show" role="alert">
	 					  Please Enter a valid amount!
	 					  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	 					</div>
	 				`;</script>
	 			';
	 		}
	 	}
	 ?>
	 <?php 
	 	if(isset($_POST['add-submit'])){
	 		$amount=floatval($_POST['add-amount']);
	 		print_r($amount<=$fundsRow['funds']?'true':'false');
	 		if($amount>0){
	 			$amount=$fundsRow['funds']+$amount;
	 			$updateFunds="UPDATE `customer` SET `funds`=".$amount." WHERE `userid`=".$_SESSION['userid']."";
	 			if (mysqli_query($connection, $updateFunds)) {
	 			  echo '<script>document.getElementById("alerts").innerHTML=`
	 					<div class="alert alert-success alert-dismissible fade show" role="alert">
	 					  Success!!
	 					  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	 					</div>
	 				`;</script>';
	 			} else {
	 			  echo "Error updating record: " . mysqli_error($conn);
	 				echo '<script>document.getElementById("alerts").innerHTML=`
	 					<div class="alert alert-danger alert-dismissible fade show" role="alert">
	 					  Error Updating Record.
	 					  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	 					</div>
	 				`;</script>';
	 			}

	 		}else{
	 			echo 
	 			'
	 				<script>document.getElementById("alerts").innerHTML=`
	 					<div class="alert alert-danger alert-dismissible fade show" role="alert">
	 					  Please Enter a valid amount!
	 					  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	 					</div>
	 				`;</script>
	 			';
	 		}
	 	}
	  ?>
</body>
</html>