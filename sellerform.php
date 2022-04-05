<!-- Needs Updates -->

<!-- Approach thought: 

  User fills all the details and then uploads the image.
 -->
<?php 
    session_start();
    require './PHP/common_files.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sell A Book</title>
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
    include './PHP/book_image_modal.php';
    ?>
  <!-- <div class="top"></div> -->
   
  <div class="container p-2">
    <?php 
      if(isset($_GET['search'])){
          // For manual input
          $sell=true;
          require './book-finder.php';
      }else if(isset($_GET['manual'])){
        echo'
          <form method="post">
            <div class="form-group  mb-4 col-sm-8">
              <label for="book-title" >Enter Book title</label>  
              <input type="text" class="form-control" name="book-title" id="book-title" >       
            </div>
            <div class="form-group mb-4 col-sm-8">
              <label for="book-isbn" >Enter book ISBN</label>
              <input type="text" class="form-control" name="book-isbn" id="book-isbn" >     
            </div>
            <div class="form-group mb-4 col-sm-8">
              <label class="form-label" for="book-description">Description</label>
              <textarea class="form-control" id="book-description" rows="4" name="book-description"></textarea>
            </div>

            <div class="form-group mb-4 col-sm-8">
              <label class="form-label" for="book-details">Enter book details</label>
              <textarea class="form-control" id="book-details" rows="4" name="book-details"></textarea>
            </div>

            <div class="form-group mb-4 col-sm-8">
              <label for="book-category" >Enter Category/Genre</label>
              <input type="text" class="form-control" name="book-category" id="book-category">  
            </div>

            <div class="form-group mb-4 col-sm-8">
              <label for="book-author" >Enter authors</label>
              <input type="text" class="form-control" name="book-author" id="book-author">  
            </div>
            <div class="form-group mb-4 col-sm-8">
              <label for="book-lang">Language Code</label>
              <input type="text" class="form-control" id="book-lang" name="book-lang">     
            </div>

            <!--<div class="form-group mb-4 col-sm-8">
              <label for="book-seller">Seller Name</label>
              <input type="text" class="form-control" id="book-seller" name="book-seller">     
            </div>-->
            
            <div class="form-group mb-4 col-sm-4">
              <label for="book-cost">Cost</label>
              <input type="number" class="form-control" id="book-cost" name="book-cost" min="0.0" step="0.01" placeholder="0.0">     
            </div>

            <div class="form-group mb-4 col-sm-4">
              <label for="book-quantity">Quantity of books</label>
              <input type="number" class="form-control" id="book-quantity" name="book-quantity">     
            </div>            

            <div class="col-auto">
              <button type="submit" class="btn btn-primary" name="sell-details-submit">Submit</button>
            </div> 
         </form>
        ';
      }else{
        echo'
          <h2>Sell a book</h2>     
          <div class="options">
            <p class="lead">You can either fill your book details manually or use our book search for filling it automatically</p>
            <a href="./sellerform.php?manual=true"class="btn btn-primary" role="button">Fill Manually</a>
            <span>or</span>
            <a href="./sellerform.php?search=true" class="btn btn-outline-success" role="button">Search book details from our Barn</a>
          </div>';
      }
    ?>
      
  
  </div>
        
<?php

// $_SESSION['userid']
  if(isset($_POST['sell-details-submit'])){
      $bookTitle= $_POST['book-title'];
      $bookISBN = $_POST['book-isbn'];
      $bookDescription= mysqli_real_escape_string($connection,$_POST['book-description']);
      $bookDetails= mysqli_real_escape_string($connection,$_POST['book-details']);
      $bookGenre= $_POST['book-category'];
      $bookAuthor= $_POST['book-author'];
      $bookCost = floatval($_POST['book-cost']);
      $bookLang=$_POST['book-lang'];
      $bookQuantity=$_POST['book-quantity'];
      //Search Books
      $bookSearch = "SELECT 1 from books_1 WHERE isbn=(SELECT isbn FROM books_1 where authors='$bookAuthor' AND original_title= '$bookTitle')";
      // echo $bookSearch;
      $queryResult= mysqli_query($connection,$bookSearch);
      //if book exists    
      if (mysqli_num_rows($queryResult)>0) {
        $book_data = mysqli_fetch_assoc($queryResult);
        print_r($book_data);
      }else{
        //input for url(image would ne added on next page)
        $bookInsert="INSERT INTO `books_1`(`books_count`,`isbn`, `authors`, `original_title`, `language_code`, `average_rating`, `cost`, `description`, `book_details`, `genre`) VALUES ('$bookQuantity', '$bookISBN','$bookAuthor','$bookTitle','$bookLang',0,'$bookCost','$bookDescription','$bookDetails','$bookGenre')";
        echo $bookInsert;
        // get id of inserted book: 
        if (mysqli_query($connection, $bookInsert)) {
          $bookID=mysqli_insert_id($connection);
          $sellInsert="INSERT INTO `sell_books`(`user_id`, `book_id`) VALUES (".$_SESSION['userid'].",'$bookID')";
          if (mysqli_query($connection, $sellInsert)) {
            echo "<script>location.href='./uploadBookImage.php?id=".$bookID."&trigger=sell'</script>";
          }else{
            echo '<script>document.getElementById("alerts").innerHTML=`
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              Error Updating Seller Data.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          `;</script>';
          }                              
        } else {
          echo(mysqli_error($connection));
          echo '<script>document.getElementById("alerts").innerHTML=`
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              Error Updating Book Data.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          `;</script>';
        }
        
      }

  }
   
  ?>       

  <?php
    require './PHP/footer.php';
  ?>
</body>
</html>

