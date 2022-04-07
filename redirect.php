<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Redirect</title>
</head>
<body>
	<?php 
		require './PHP/common_files.php';
		require './PHP/header.php';
	 ?>
	 <?php 
	 //Check Trigger
	 	if(isset($_GET['trigger'])){
	 		$bookID=$_GET['id'];
	 		$trigger=$_GET['trigger'];
	 		//sell 
	 		// if($_GET['trigger']=='sell'){
	 			echo "<script>location.href='./uploadBookImage.php?id=".$bookID."&trigger=".$trigger."'</script>";
	 		// }else{

	 		// }
	 	}elseif(isset($_GET['backTo'])){
	 		echo "<script>location.href='./".$_GET['backTo']."'</script>";
	 	}
	  ?>
</body>
</html>