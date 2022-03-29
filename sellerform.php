<?php 
    session_start();
    require './PHP/common_files.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Rent A Book</title>
</head>
<body>
  <?php
    require './PHP/connect.php';
    include './PHP/header.php';
  ?>
  <h2>Rent your book</h2>     
  <!-- <div class="top"></div> -->

  <div class="container p-2">
    <?php 
      if(!isset($_GET['manual'])){
          echo'
          <div class="options">
            <p class="lead">You can either fill your book\'s details manually or use our book search for filling it automatically</p>
            <a href="./sellerform.php?manual=true"class="btn btn-primary" role="button">Fill Manually</a>
            <span>or</span>
            <a href="./book-finder.php?trigger=sellerform.php" class="btn btn-outline-success" role="button">Search book details from our Barn</a>
          </div>';
      }else{
        echo'
          <form action="" method="post">
            <div class="form-group  mb-4 col-sm-8">
              <label for="book-title" >Enter Book title</label>  
              <input type="text" class="form-control" name="book-title" id="book-title" >       
            </div>
            <div class="form-group mb-4 col-sm-8">
              <label for="book-isbn" >Enter book ISBN</label>
              <input type="text" class="form-control" name="book-isbn" id="book-isbn" >     
            </div>
            <div class="form-group mb-4 col-sm-8">
              <label class="form-label" for="book-description" name="">Description</label>
              <textarea class="form-control" id="book-description" rows="4" name="book-description"></textarea>
            </div>

            <div class="form-group mb-4 col-sm-8">
              <label class="form-label" for="book-details">Enter book details</label>
              <textarea class="form-control" id="book-details" rows="4" name="book-details"></textarea>
            </div>

            <div class="form-group mb-4 col-sm-8">
              <label for="book-category" >Enter genre</label>
              <input type="text" class="form-control" name="book-category" id="book-category">  
            </div>

            <div class="form-group mb-4 col-sm-8">
              <label for="book-author" >Enter authors</label>
              <input type="text" class="form-control" name="book-author" id="book-author">  
            </div>


            <div class="form-group mb-4 col-sm-4">
              <label for="book-cost">Cost</label>
              <input type="number" class="form-control" id="book-cost" name="book-cost">     
            </div>

            <!--<div class="form-group mb-4 col-sm-4">
              <label for="rent-cost">Rent charges</label>
              <input type="number" class="form-control" id="rent-cost" name="rent-cost">     
            </div>

            <div class="form-group mb-4 col-sm-4">
              <label for="rent-duration">Duration for rent (In days)</label>
              <input type="number" class="form-control" name="rent-duration" id="rent-duration">     
            </div>-->

            <div class="col-auto">
              <button type="submit" class="btn btn-primary" name="rent-details-submit">Submit</button>
            </div> 
         </form>
        ';
      }
    ?>
      
  
  </div>


        
<?php
// $_SESSION['userid']
// if(isset($_POST['submit'])){
              
//                     $Username = $_POST['username'];
//                     $Email = $_POST['email'];
//                     $Title= $_POST['title'];
//                     $ISBN = $_POST['isbn'];
//                     $Description= $_POST['description'];
//                     $Details= $_POST['details'];
//                     $Genre= $_POST['genre'];
//                     $Author= $_POST['author'];
//                     $Ogcost = $_POST['ogcost'];
//                     $Rentcost = $_POST['rentcost'];
//                     $Rentduration = $_POST['rentduration'];

//                     $isbnsearch = "SELECT * FROM books where book_isbn = '$ISBN'";
//                     $query= mysqli_query($connection,$isbnsearch);
                        
//                   if (mysqli_num_rows($query)>0) {
//                     $book_data = mysqli_fetch_assoc($query);
//                     print_r($book_data);
//                   }

// }
// else{

//   $userid = $_SESSION['userid']
//   $query2 = "INSERT INTO rent VALUES 
//     ('', 'Doe', 'john@example.com')";
// }
   
  ?>       

  <?php
    require './PHP/footer.php';
  ?>
  <!-- <script src="./JS/book-json.js"></script> -->
</body>
</html>




