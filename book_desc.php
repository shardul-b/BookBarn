<?php 
    session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Product Desciption</title>
    <link href="./bootstrap-5.0.2-dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" href="assets/fonts/ionicons.min.css"> -->
    <!-- <link rel="stylesheet" href="assets/css/Projects-Horizontal.css"> -->
    <!-- <link rel="stylesheet" href="assets/css/styles.css"> -->
</head>

<body>
<?php 

  include("./PHP/header.php");
  include('./PHP/connect.php');
?>
<?php 
    $sql = "SELECT * FROM books where book_id=".$_GET['id']."";
    if($result = mysqli_query($connection, $sql)){
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    }else{
      //query fails
      echo("Yo");
    }

?>
    <div class="container my-4">
        <div class="row">
            <div class="col-sm-3">
                <div style="max-width:5em;">
                  <img src="
                  <?php
                      echo $row['image_url'];
                  ?>" 
                  class="image">
                </div>
                <button class="btn-lg btn-success  my-3 w-100" >Buy Now</button>
            </div>
        <div class="col-sm-6 mx-5">
            <h4>  
                <?php 
                    echo $row['original_title'];
                ?>
            </h4>
            <h5> 
                &#8377; 
                <?php echo  $row['cost'];?>
            </h5>   
            <p>Inclusive of all tax</p>
                <div class="input-group">
                    <input type="number" min="0" max="5" class="form-control">
                    <button class="btn btn-primary">Add to cart</button>
                </div>
                <h3 class="mt-5">Book Details</h3>
                <p><?php 
                $text=$row['book_details'];
                $text=preg_replace('/,/',"<br/>",$text,20);
                echo $text;
              ?></p>
            </div>
        </div>
        <h4 class="mt-2">Description</h4>
        <p style="text-align: justify;"><?php echo $row['description'];
              ?></p>
    </div>
    <?php 

        include './PHP/footer.php';
     ?>
    <script src="./bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>