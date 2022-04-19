<?php 
    session_start();
    require './PHP/common_files.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Rent A Book</title>
</head>
<body>
  <?php
    require './PHP/connect.php';
    include './PHP/header.php';
  ?>
  <?php 
    require './PHP/error.php';
   ?>
  <!-- <div class="top"></div> -->
   
  <div class="container p-2">
    <?php 
      if(isset($_GET['search'])){
          // For manual input
          $rent=true;
          require './book-finder.php';
      }else if(isset($_GET['manual'])){
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
              <label class="form-label" for="book-description">Description</label>
              <textarea class="form-control" id="book-description" rows="4" name="book-description"></textarea>
            </div>

            <div class="form-group mb-4 col-sm-8">
              <label class="form-label" for="book-pub">Enter original publication year</label>
              <textarea class="form-control" id="book-pub" rows="4" name="book-pub"></textarea>
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

            <div class="form-group mb-4 col-sm-4">
              <label for="book-cost">Cost</label>
              <input type="number" class="form-control" id="book-cost" name="book-cost" min="0.0" step="0.01" placeholder="0.0">     
            </div>

            <div class="form-group mb-4 col-sm-4">
              <label for="rent-cost">Rent charges (in days)</label>
              <input type="number" class="form-control" id="rent-cost" name="rent-cost" title="eg:if rs 3/day then enter 3.00" min="0.0" step="0.01" placeholder="0.0">     
            </div>

            <div class="form-group mb-4 col-sm-4">
              <label for="rent-duration">Duration for rent (In days)</label>
              <input type="number" class="form-control" name="rent-duration" id="rent-duration">     
            </div>

            <div class="col-auto">
              <button type="submit" class="btn btn-primary" name="rent-details-submit">Submit</button>
            </div> 
         </form>
        ';
      }else{
        echo'
          <h2>Rent your book</h2>     
          <div class="options">
            <p class="lead">You can either fill your book details manually or use our book search for filling it automatically</p>
            <a href="./rentform.php?manual=true"class="btn btn-primary me-2" role="button">Fill Manually</a>
            <span>OR</span>
            <a href="./rentform.php?search=true" class="ms-2 btn btn-outline-success" role="button">Search book details from our Barn</a>
          </div>';
      }
    ?>
      
  
  </div>


        
<?php
// $_SESSION['userid']
  if(isset($_POST['rent-details-submit'])){
 
      $bookTitle= $_POST['book-title'];
      $bookISBN = $_POST['book-isbn'];
      $bookDescription= mysqli_real_escape_string($connection,$_POST['book-description']);
      $bookPub= $_POST['book-pub'];
      $bookGenre= $_POST['book-category'];
      $bookAuthor= $_POST['book-author'];
      $bookCost = floatval($_POST['book-cost']);
      $bookLang=$_POST['book-lang'];
      $bookRentcost = floatval($_POST['rent-cost']);
      $bookRentduration = $_POST['rent-duration'];
      //Search Books
      $bookSearch = "SELECT * from books WHERE isbn=(SELECT isbn FROM books where authors='$bookAuthor' AND original_title= '$bookTitle')";
      // echo $bookSearch;
      $queryResult= mysqli_query($connection,$bookSearch);
      //if book exists    
      if (mysqli_num_rows($queryResult)>0) {
        //works
        $book_data = mysqli_fetch_assoc($queryResult);
        // print_r($book_data);
      }else{
        $bookInsert="INSERT INTO `books`(`books_count`,`isbn`, `authors`,`original_publication_year`, `original_title`,`title`, `language_code`, `average_rating`, `categories`, `cost`, `description`) VALUES (0, '$bookISBN','$bookAuthor','$bookPub','$bookTitle','$bookTitle','$bookLang',0,'$bookGenre','$bookCost','$bookDescription')";
        // echo $bookInsert;
        // get id of inserted book: 
        if (mysqli_query($connection, $bookInsert)) {
          $bookID=mysqli_insert_id($connection);
          
          $rentInsert="INSERT INTO `rent`(`user_id`, `rent_book_id`, `quantity`, `period`, `cost`) VALUES ('".$_SESSION['userid']."','$bookID',1,'$bookRentduration','$bookRentcost')";
          if (mysqli_query($connection, $rentInsert)) {
            echo "<script>location.href='./uploadBookImage.php?id=".$bookID."&trigger=rent'</script>";
          }else{
            echo mysqli_error($connection);
            echo '<script>document.getElementById("alerts").innerHTML=`
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              Error Updating Rent Data.
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
  <!-- <script src="./JS/book-json.js"></script> -->
</body>
</html>



<!-- 
1. When user enters a book for rent the book_count would be 0 since it is not available to buy yet

2. However the book desc page would be displayed with "avaialble on rent" button so that user can check rent details and add his own date

3. This date will be approved by Renter(user who has put the book no rent)



Wallet:

on step 2 if a user has less balance than mentioned in the rates of rent. The user would not be allowed to send request for rent.

if he has then the amount of rent eg- 5rs per day for 10 days would be 50 and if book cost=200
then user's 150 rs would be frozen (50 for rent 100 for book)
then 5 rs would be deducted from user's account daily until he cancel's rent(After which he/ she has a window of 2 days to return the book else fine period would start)

if returned on time- no fine and leftover money returned to user

else- fine from frozen amount
 --> 