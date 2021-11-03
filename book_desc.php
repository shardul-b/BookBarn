<?php 
    session_start();
    require'./PHP/common_files.php';
    if(!isset($_SESSION['userid'])){
        echo "<script> location.href='./login.php'; </script>";
    }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
     <title>Product Desciption</title>
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

                <?php 
                   echo' <a href="checkout.php?id='.$_GET["id"].'"type="button" class="btn-lg d-block btn-success my-3 w-100 text-center text-decoration-none">Buy Now</a>';
                 ?>
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
            <form method="post">
                <div class="input-group">
                    <input type="number" min="0" max="2" name="quantity" class="form-control">
                    <button class="btn btn-primary" name="cart_button" type="submit">Add to cart</button>
                </div>
            </form>
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
    <?php
        if(isset($_POST['cart_button'])){
            if(!isset($_SESSION['userid'])){
                echo "<script> location.href='./login.php'; </script>";
            }else{
                $quantity=$_POST['quantity'];
                $SQL = "INSERT INTO cart (cust_id,book_id,quantity) VALUES ('". $_SESSION['userid'] ."','". $_GET['id'] ."','".$quantity."')";  
                $result = mysqli_query($connection,$SQL) or die('Invalid query:'.mysqli_error($connection));
            }
        }
    ?>
</body>

</html>

 
