<?php 
    session_start();

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title></title>
</head>
<body>
  <?php
            require './PHP/connect.php';
            include './PHP/header.php';

        ?>
       
        <div class="top"></div>
        <div class="container p-2"></div>
        <h2>Rent your book</h2>

        <form action="" method="post">

     <div class="form-group mb-4 col-sm-6">
    <label for="exampleInputUsername">User name</label>
    <input type="text" class="form-control" name="username">     
  </div>
     <div class="form-group mb-4 col-sm-6" >
    <label for="exampleInputEmail">Email</label>
    <input type="email" class="form-control" name="email">     
  </div>

  
  <div class="form-group mb-4 col-sm-6">
    <label for="exampleInputEmail" >Enter book ISBN</label>
    <input type="text" class="form-control" name="isbn" onInput="getapi()">     
  </div>

  
  <div class="form-group mb-4 col-sm-6">
    <label for="exampleInputEmail">enter book title</label>
    <input type="text" class="form-control" name="title">     
  </div>

  <div class="form-outline mb-4 col-sm-6">
    <label class="form-label" for="form4Example3" name="">Description</label>
    <textarea class="form-control" id="form4Example3" rows="4" name="description"></textarea>
  </div>

<div class="form-outline mb-4 col-sm-6">
    <label class="form-label" for="form4Example3">Enter book details</label>
    <textarea class="form-control" id="form4Example3" rows="4" name="details"></textarea>
  </div>

<div class="form-group mb-4 col-sm-6">
  <label for="exampleInputEmail" >Enter genre</label>
    <input type="text" class="form-control" name="genre">  
    
  </div>

<div class="form-group mb-4 col-sm-6">
   <label for="exampleInputEmail" >Enter author</label>
   <input type="text" class="form-control" name="author">  
  </div>


  <div class="form-group mb-4 col-sm-6">
    <label for="exampleInputEmail"> Enter books orginal cost</label>
    <input type="number" class="form-control" name="ogcost">     
  </div>

  <div class="form-group mb-4 col-sm-6">
    <label for="exampleInputEmail">Set cost for rent</label>
    <input type="number" class="form-control" name="rentcost">     
  </div>

  <div class="form-group mb-4 col-sm-6">
    <label for="exampleInputEmail">Set duration for rent</label>
    <input type="number" class="form-control" name="rentduration">     
  </div>

  <div class="col-auto">
    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
  </div>

        </form>
<?php
$_SESSION['userid']
if(isset($_POST['submit'])){
              
                    $Username = $_POST['username'];
                    $Email = $_POST['email'];
                    $Title= $_POST['title'];
                    $ISBN = $_POST['isbn'];
                    $Description= $_POST['description'];
                    $Details= $_POST['details'];
                    $Genre= $_POST['genre'];
                    $Author= $_POST['author'];
                    $Ogcost = $_POST['ogcost'];
                    $Rentcost = $_POST['rentcost'];
                    $Rentduration = $_POST['rentduration'];

                    $isbnsearch = "SELECT * FROM books where book_isbn = '$ISBN'";
                    $query= mysqli_query($connection,$isbnsearch);
                        
                  if (mysqli_num_rows($query)>0) {
                    $book_data = mysqli_fetch_assoc($query);
                    print_r($book_data);
                  }

}
else{

  $userid = $_SESSION['userid']
  $query2 = "INSERT INTO rent VALUES 
    ('', 'Doe', 'john@example.com')";
}
   
  ?>       


<script src="./JS/book-json.js"></script>
</body>
</html>


TO DO:
fill bookid userid in rent userid from session
insert in rent



