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
		if(isset($_GET['id'])){
			if(isset($_GET['image_url'])){
				echo $_GET['image_url'];
			}
			$bookId=$_GET['id'];
			$trigger=$_GET['trigger'];
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
                $fileNameNew = 'book'.$bookId.'.'.$fileActualExt;
                $target_dir = "Uploads/".$_SESSION['user_id']."/Books/".$fileNameNew;
                // $insertDocument="UPDATE `books` SET `image`='./".$target_dir."' WHERE `user_id`='".$userID."'";
                //requires Update
                $del='';
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
                    echo '
                    <script type="text/javascript">
                    location.href="./redirect.php?action=sell-image-success;
                    </script>';
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