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


            <div class="form-group mb-4 col-sm-4">
              <label for="book-cost">Cost</label>
              <input type="number" class="form-control" id="book-cost" name="book-cost">     
            </div>

            <div class="form-group mb-4 col-sm-4">
              <label for="rent-cost">Rent charges (in days)</label>
              <input type="number" class="form-control" id="rent-cost" name="rent-cost" title="eg:if rs 3/day then enter 3">     
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
            <a href="./rentform.php?manual=true"class="btn btn-primary" role="button">Fill Manually</a>
            <span>or</span>
            <a href="./rentform.php?search=true" class="btn btn-outline-success" role="button">Search book details from our Barn</a>
          </div>';
      }
    ?>
      
  
  </div>


        
<?php
// $_SESSION['userid']
  if(isset($_POST['rent-details-submit'])){
 
      $bookTitle= $_POST['book-title'];
      $bookISBN = $_POST['book-isbn'];
      $bookDescription= $_POST['book-description'];
      $bookDetails= $_POST['book-details'];
      $bookGenre= $_POST['book-category'];
      $bookAuthor= $_POST['book-author'];
      $bookCost = $_POST['book-cost'];
      $bookRentcost = $_POST['rent-cost'];
      $bookRentduration = $_POST['rent-duration'];
      //Search Books
      $bookSearch = "SELECT 1 from books WHERE book_isbn=SELECT book_isbn FROM books where authors='bookAuthors' AND title= '$bookTitle'";
      $query= mysqli_query($connection,$bookSearch);
      //if book exists    
      if (mysqli_num_rows($query)>0) {
        $book_data = mysqli_fetch_assoc($query);
        print_r($book_data);
      }else{
        // book id should be auto incremented
        //remove book_count
        //implement input for publication year
        //implement input for language code
        //input for url
        $bookInsert="INSERT INTO `books`(`book_isbn`, `authors`, `original_publication_year`, `original_title`, `language_code`, `average_rating`, `image_url`, `cost`, `description`, `book_details`, `genre`) VALUES ( '$bookISBN','$bookAuthor',[value-4],'$bookTitle',[value-7],0,[value-10],'$bookCost','$bookDescription','$bookDetails','$bookGenre')";
        //get id of inserted book: $bookID=mysqli_insert_id($conn)

        $rentInsert="INSERT INTO `rent`(`user_id`, `rent_book_id`, `period`, `cost`) VALUES ('$_SESSION["userid"]','$bookid','$bookRentduration','$bookRentcost')";

        
      }

  }
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


<!-- TO DO:
fill bookid userid in rent userid from session
insert in rent -->