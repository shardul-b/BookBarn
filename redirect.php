<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<?php 
		require './PHP/header.php';
	 ?>
	 <?php 
	 	if(isset($_GET['action'])){
	 		if($_GET['action']=='sell-image-success'){
	 			echo '<script type="text/javascript">
                    location.href="./sellerform.php??manual=true;
                    </script>';
	 		}
	 	}
	  ?>
</body>
</html>