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
    <style>
        img{
            max-width: 100%;
        }
        iframe{
            width: 100%;
            height: 25em;
        }
    </style>
</head>

<body>
<?php 

  include("./PHP/header.php");
  include('./PHP/connect.php');
?>
<?php 
    $sql = "SELECT * FROM books where book_id=".$_GET['id']."";
    $rating='';
    if($result = mysqli_query($connection, $sql)){
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        switch (intval($row['average_rating'])){
            case 1:
                $rating='
                <i class="fas fa-star" style="color: #ffcc33;"></i>
                <i class="far fa-star" style="color: #ffcc33;"></i>
                <i class="far fa-star" style="color: #ffcc33;"></i>
                <i class="far fa-star" style="color: #ffcc33;"></i>
                <i class="far fa-star" style="color: #ffcc33;"></i>';
                break;
            case 2:
                $rating='
                <i class="fas fa-star" style="color: #ffcc33;"></i>
                <i class="fas fa-star" style="color: #ffcc33;"></i>
                <i class="far fa-star" style="color: #ffcc33;"></i>
                <i class="far fa-star" style="color: #ffcc33;"></i>
                <i class="far fa-star" style="color: #ffcc33;"></i>';
                break;
            case 3:
                $rating='
                <i class="fas fa-star" style="color: #ffcc33;"></i>
                <i class="fas fa-star" style="color: #ffcc33;"></i>
                <i class="fas fa-star" style="color: #ffcc33;"></i>
                <i class="far fa-star" style="color: #ffcc33;"></i>
                <i class="far fa-star" style="color: #ffcc33;"></i>';
                break;
            case 4:
                $rating='
                <i class="fas fa-star" style="color: #ffcc33;"></i>
                <i class="fas fa-star" style="color: #ffcc33;"></i>
                <i class="fas fa-star" style="color: #ffcc33;"></i>
                <i class="fas fa-star" style="color: #ffcc33;"></i>
                <i class="far fa-star" style="color: #ffcc33;"></i>';
                break;
            case 5:
                $rating='
                <i class="fas fa-star" style="color: #ffcc33;"></i>
                <i class="fas fa-star" style="color: #ffcc33;"></i>
                <i class="fas fa-star" style="color: #ffcc33;"></i>
                <i class="fas fa-star" style="color: #ffcc33;"></i>
                <i class="fas fa-star" style="color: #ffcc33;"></i>';
                break;
            default:
                $rating='';
                break;
        }
    }else{
      //query fails
      echo("Yo");
    }

?>
    <div class="container my-4">
        <div class="row">
            <div class="col-sm-3">
                <div style="max-width:20em;" >
                  <img src="
                  <?php
                      echo $row['image_url'];
                  ?>" 
                  style="object-fit: contain;">
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
            <div class="rating my-2">
                <?php echo $rating; ?>
            </div>
            <form method="post">
                <div class="col-8">
                <div class="input-group">
                    <input type="number" min="0" max="2" name="quantity" class="form-control">
                    <button class="btn btn-primary" name="cart_button" type="submit">Add to cart</button>
                </div>
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
    <div class="container my-4">
        <h5>Some Books You might like</h5>
         <iframe src="./content.php" title="Recommended Books"></iframe> 
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

 
