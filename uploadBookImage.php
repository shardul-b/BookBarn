<?php 
    session_start();
    require './PHP/common_files.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Upload Book Image</title>
</head>
<body>
	<?php
	  require './PHP/connect.php';
	  include './PHP/header.php';
	?>
	<?php 
	  require './PHP/error.php';
	 ?>

	<?php 
		$bookId='';
		$trigger='';
		$link='';
		$action='';
		if(isset($_GET['id'])){
			if(isset($_GET['image_url'])){
				echo $_GET['image_url'];
			}
			$bookId=$_GET['id'];
			$trigger=$_GET['trigger'];
			if(isset($_GET['action'])){
				$action=$_GET['action'];
			}
		}
	 ?>
	 <div class="container-fluid">
	 	<h3 class="modal-title">Choose book Image</h3>	
	 	<form method="post" enctype="multipart/form-data">
	 	    <!-- <div class="input-group my-3"> -->
	 	    	<div class="mb-3 custom-file col-sm-5">
	 	    	  <label for="formFile" class="form-label">Choose Image</label>
	 	    	  <input class="form-control" type="file" name="file" id="formFile">
	 	    	</div>
	 	        <!-- <div class="custom-file"> -->
<!-- 	 	            <input type="file" name="file" class="custom-file-input" id="bookInput" onchange="displayImage()">
	 	            <label class="custom-file-label" for="bookInput">Choose Image</label> -->
	 	        <!-- </div> -->
<!-- 	 	        <div class="input-group"> -->
	 	            <button type="submit" class="btn btn-dark input-group-text" name="book-submit" id="book-submit">Upload Image</button>
	 	        <!-- </div> -->
	 	    <!-- </div> -->
	 	</form>
	 	<!-- <div id="display_image_name">
	 	    
	 	</div> -->
	 </div>
	 
	 <?php 
	 	$bookImageSql="SELECT `image_url` FROM `books` WHERE `book_id`='".$bookId."'";
	 	if($trigger=="rent"){
	 		$bookImageSql="SELECT `rent_book_image` FROM `rent` WHERE `rent_book_id`='".$bookId."'";
	 	}
	 	// echo $bookImageSql;
	 	$bookImageResult = mysqli_query($connection, $bookImageSql);

	 	if (mysqli_num_rows($bookImageResult) > 0) {
	 	  $bookImageRow = mysqli_fetch_assoc($bookImageResult);
	 	  if($trigger=="sell"){
	 	  	if(!is_null($bookImageRow['image_url'])){
	  	 	  echo'
 	  	 	  <div class="container">
 	  		 	  <div class="col-sm-3" style="margin:0 auto;">
 	  		 	  	<div style="max-width:20em; " class="my-2" >
 	  		 	  	  <img src="'.$bookImageRow["image_url"].'"
 	  		 	  	  style="object-fit: contain;">
 	  		 	  	</div>
  	 	  		 	  <div class="d-flex justify-content-center">		
  		 	  		 	  <a href="./index.php?newbook=success" class="ms-5 me-2 col-sm-6 btn btn-success">Confirm</a>
  		 	  		 	  <a href="./uploadBookImage.php?action=delete&id='.$bookId.'&trigger=sell" class="col-sm-6 btn btn-danger">Delete</a>  
  		  		 	  </div>
 	  		 	  </div>
 	  		 	  
 	  		 </div>
	  	 	  ';	
	 	  	}	
	 	  }elseif($trigger=="rent"){
	 	  	if(!is_null($bookImageRow['rent_book_image'])){
	  	 	  echo'
 	  	 	  <div class="container">
 	  		 	  <div class="col-sm-3" style="margin:0 auto;">
 	  		 	  	<div style="max-width:20em; " class="my-2" >
 	  		 	  	  <img src="'.$bookImageRow["rent_book_image"].'"
 	  		 	  	  style="object-fit: contain;">
 	  		 	  	</div>
  	 	  		 	  <div class="d-flex justify-content-center">		
  		 	  		 	  <a href="./index.php?newbook=success" class="ms-5 me-2 col-sm-6 btn btn-success">Confirm</a>
  		 	  		 	  <a href="./uploadBookImage.php?action=delete&id='.$bookId.'&trigger=rent" class="col-sm-6 btn btn-danger">Delete</a>  
  		  		 	  </div>
 	  		 	  </div>
 	  		 	  
 	  		 </div>
	  	 	  ';	
	 	  	}
	 	  }
	 	  
	 	}
	  ?>
</body>
</html>

<?php
if (isset($_POST["book-submit"])) {
    $file=$_FILES['file'];  
    // File Name
    $fileName=$_FILES['file']['name'];
    // File temporary Name
    $fileTemp=$_FILES['file']['tmp_name'];
    // File Size
    $fileSize=$_FILES['file']['size'];
    //File Error
    $fileError=$_FILES['file']['error'];
    //Type
    $fileType=$_FILES['file']['type'];
    //Extension
    $fileExt=explode('.', $fileName);
    $fileActualExt=strtolower(end($fileExt));
    //Allowed Extensions
    $allowed=array('png','jpeg','jpg');
    //Check for extension
    if(in_array($fileActualExt,$allowed)){
        //If no error in file upload
        if($fileError === 0){
            // FileSize less than 10 MB
            if($fileSize < 10000000){
                //Creates unique ID based on the current microseconds
                $fileNameNew = $trigger.'book'.$bookId.'.'.$fileActualExt;
                $target_dir = "Uploads/".$_SESSION['userid']."/books/".$fileNameNew;
                $insertDocument='';
                if($trigger=="sell"){
                	$insertDocument="UPDATE `books` SET `image_url`='./".$target_dir."' WHERE `book_id`='".$bookId."'";	
                }elseif($trigger=="rent"){
                	$insertDocument="UPDATE `rent` SET `rent_book_image`='./".$target_dir."' WHERE `rent_book_id`='".$bookId."'";
                }
                //requires Update
                // $del='';
                if (mysqli_query($connection, $insertDocument)) {
                    // if(file_exists('./Uploads/'.$_SESSION['user_id'].'/book.png')){
                    //     $del=unlink('./Uploads/'.$_SESSION['user_id'].'/book.png');
                    // }else if (file_exists('./Uploads/'.$_SESSION['user_id'].'/book.jpg')) {
                    //     $del=unlink('./Uploads/'.$_SESSION['user_id'].'/book.jpg');
                    // }else if (file_exists('./Uploads/'.$_SESSION['user_id'].'/book.jpeg')){
                    //     $del=unlink('./Uploads/'.$_SESSION['user_id'].'/book.jpeg');
                    // }
                    move_uploaded_file($fileTemp, $target_dir);
                    echo 
                    '<script>document.getElementById("alerts").innerHTML=`
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                          Successfully Uploaded!!
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    `;</script>
                    ';
                    // if($trigger=="sell"){
		                echo '
		                <script type="text/javascript">
		                	location.href="./redirect.php?id='.$bookId.'&trigger='.$trigger.'";
		                </script>';
                	// }
                } else {
                  echo '<script>document.getElementById("alerts").innerHTML=`
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          Error While Uploading File
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    `;</script>
                    ';;
                }               
                
            }

            else{
                echo
                '<script>document.getElementById("alerts").innerHTML=`
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          Your File is too big: '.$fileSize.' kbs
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    `;</script>
                    ';
            }
        }else{
            echo'<script>document.getElementById("alerts").innerHTML=`
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          Error while uploading file
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    `;</script>
                    ';
        }

    }else{
        echo'<script>document.getElementById("alerts").innerHTML=`
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          Invalid File type
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    `;</script>
                    ';;
    }
}



 ?>
<?php
	if($action=="delete" && $trigger=="sell"){
		$deleteImage="UPDATE `books` SET `image_url`=NULL WHERE `book_id`='".$bookId."'";
		if (mysqli_query($connection, $deleteImage)) {
			//Delete the file regardless of extension

			$file_pattern = "Uploads/".$_SESSION['userid']."/books/".$trigger."book".$bookId.".*";
			array_map("unlink",glob( $file_pattern));
			echo '
			<script type="text/javascript">
				location.href="./redirect.php?id='.$bookId.'&trigger='.$trigger.'";
			</script>';
		  	// unlink("Uploads/".$_SESSION['user_id']."/books/");
		} else {
		  echo "Error deleting record: " . mysqli_error($connection);
		}
	}elseif ($action=="delete" && $trigger=="rent") {
		$deleteImage="UPDATE `rent` SET `rent_book_image`=NULL WHERE `rent_book_id`='".$bookId."'";
		if (mysqli_query($connection, $deleteImage)) {
			//Delete the file regardless of extension

			$file_pattern = "Uploads/".$_SESSION['userid']."/books/".$trigger."book".$bookId.".*";
			array_map("unlink",glob( $file_pattern));
			echo '
			<script type="text/javascript">
				location.href="./redirect.php?id='.$bookId.'&trigger='.$trigger.'";
			</script>';
		  	// unlink("Uploads/".$_SESSION['user_id']."/books/");
		} else {
		  echo "Error deleting record: " . mysqli_error($connection);
		}
	}

?>