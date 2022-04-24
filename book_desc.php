<?php 
    /*
        Updates required:
        Check if a book is available on rent
        display rent details 
        let user(user can't  be the renter) insert his dates for rent
    */
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

    <style>
        img{
            max-width: 100%;
        }
        iframe{
            width: 100%;
            height: 20em;
        }
        /*<style>*/
        
        .card{
            width: 12rem;
        }
        .image-wrapper{
            object-fit: cover;
        }
        img{
            object-fit: contain;
        }
        .card-title{
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis; 
        }
    </style>
</head>

<body>
<?php 

  include("./PHP/header.php");
  include("./PHP/error.php");

  include('./PHP/connect.php');
?>
<?php 
    $sql = "SELECT * FROM books where book_id=".$_GET['id']."";
    $rentSQL="SELECT * FROM rent where rent_book_id=".$_GET['id']."";
    $rating='';
    $bookCost='';
    if($result = mysqli_query($connection, $sql)){
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $bookCost=$row['cost'];
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
                    if($row['books_count']>0){
                       echo' <a href="checkout.php?id='.$_GET["id"].'"type="button" class="btn-lg d-block btn-success my-3 w-100 text-center text-decoration-none">Buy Now</a>';
                    }
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
                    <?php
                        if($row['books_count']>0){
                            echo '<button class="btn btn-primary" name="cart_button" type="submit">Add to cart</button>';
                        }else{
                            echo '<button class="btn btn-secondary" name="cart_button" type="submit" disabled>Out of stock</button>';
                        }
                    ?>
                    
                </div>
                </div>
            </form>
                <h3 class="mt-5">Book Details</h3>
                <p>Full product name: <?php 
                // $text=$row['book_details'];
                // $text=preg_replace('/,/',"<br/>",$text,20);
                echo $row['title'];
              ?></p>
                <p>Author(s): <?php 
                // $text=$row['book_details'];
                // $text=preg_replace('/,/',"<br/>",$text,20);
                echo $row['authors'];
              ?></p>
                <p>ISBN: <?php 
                // $text=$row['book_details'];
                // $text=preg_replace('/,/',"<br/>",$text,20);
                echo $row['isbn'];
              ?></p>
              <p>Language code: <?php 
                // $text=$row['book_details'];
                // $text=preg_replace('/,/',"<br/>",$text,20);
                echo $row['language_code'];
              ?></p>
              <p>Category: <?php 
                // $text=$row['book_details'];
                // $text=preg_replace('/,/',"<br/>",$text,20);
                echo $row['categories'];
              ?></p>
              <p>Original Publication Year: <?php 
                // $text=$row['book_details'];
                // $text=preg_replace('/,/',"<br/>",$text,20);
                echo $row['original_publication_year'];
              ?></p>
            </div>
        </div>
        <h4 class="mt-2">Description</h4>
        <p style="text-align: justify;"><?php echo $row['description'];
              ?></p>
        <hr/>
        <!-- Rent Box -->
        <?php 
            $renterId='';
            $rent_result = mysqli_query($connection, $rentSQL);
            if (mysqli_num_rows($rent_result) > 0) {
              echo "<h3>Available on Rent</h3>";
              // output data of each row
              while($rent_row = mysqli_fetch_assoc($rent_result)) {
                $renterId=$rent_row['user_id'];
                // if(!$renterId==$_SESSION['userid']){


                $userSQL="SELECT `username` from `customer` WHERE `userid`='".$rent_row['user_id']."'";
                $userResult=mysqli_query($connection, $userSQL);
                $user_row=mysqli_fetch_assoc($userResult); 
                // $rentCost=$rentRow["cost"];
                    echo'
                    <div class="row py-3 border-bottom border-default rent-details">
                        <div class="col-md-2 col-5 d-flex justify-content-end ">
                            <img src="'.$rent_row["rent_book_image"].'" class="" alt="Image" style=" max-width:8em; ">
                        </div>
                        <div class="col-md-8 col-7 border border-default">
                            <div class="card border-0 w-100">
                                <div class="card-body ">
                                    <h5>'.$row["original_title"].'</h5>
                                        <p>Rented By: '.$user_row["username"].'</p>
                                    <div class="period">
                                        <p>'.$rent_row["period"].' days</p>
                                    </div>
                                    <span class="card-text d-block">&#8377;'.$rent_row["cost"].' per day</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    ';
              // }
          }
                echo"<h5>Want this book on rent?</h5>";
                echo "<p>Just Enter a Date and we will deliver the book to you!!";
                echo
                '
                    <form method="POST">
                        <div class="input-group mb-3">
                          <span class="input-group-text" id="rent-date">Enter Start Date</span>
                          <input type="date" class="form-control" placeholder="DD/MM/YYYY" aria-label="Enter Start Date" name="rent-date" aria-describedby="rent-date">
                        </div>
                        <button type="submit" name="rent-date-submit">Confirm</button>
                    </form>
                ';

            }

         ?>
        
    </div>

    <div class="container my-4">
                 
         <iframe src="./content.php?title=<?php echo $row['title']; ?>" title="Recommended Books" ></iframe> 
    </div>
    <div class="container my-4">
        <h5>Books in this Category:</h5>
                
        <div id="books" class="row d-block" style=" white-space: nowrap; overflow-x:auto;">
            <?php
                $othersql = "SELECT `book_id`,`image_url`,`original_title`,`cost`,`average_rating` FROM books where `categories` IN('".$row['categories']."')  LIMIT 10";
                if($otherresult = mysqli_query($connection, $othersql)){
                    //$row = mysqli_fetch_all($result, MYSQLI_NUM);
                    while ($otherrow = mysqli_fetch_array($otherresult, MYSQLI_ASSOC)) {
                        // print_r($row);
                        switch (intval($otherrow['average_rating'])){
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
                                $rating='
                                <i class="far fa-star" style="color: #ffcc33;"></i>
                                <i class="far fa-star" style="color: #ffcc33;"></i>
                                <i class="far fa-star" style="color: #ffcc33;"></i>
                                <i class="far fa-star" style="color: #ffcc33;"></i>
                                <i class="far fa-star" style="color: #ffcc33;"></i>';
                                break;
                        }
                        echo'
            <div class="book-wrapper col-lg-2 d-inline-block ms-2">
                <a href="book_desc.php?id='.$otherrow["book_id"].'" target="_blank" class="text-decoration-none link-dark">
                    <div class="card">
                        <div class="ratio ratio-4x3 image-wrapper">
                            <img src="'.$otherrow["image_url"].'" class="card-img-top py-2">
                        </div>
                        <div class="card-body">
                            <h6 class="card-title">'.$otherrow["original_title"].'</h6>
                            <div class="rating">
                               '.$rating.'
                            </div>
                            <p class="card-text">₹ '.$otherrow["cost"].'</p>
                        </div>
                    </div>
                </a>
            </div>';
        }
    }
            ?>
        </div>
    </div>
    <?php 

        include './PHP/footer.php';
     ?>
    <!-- <script src="./bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script> -->
    <!-- Cart -->
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
    <!-- Rent -->
    <?php 
        if(isset($_POST['rent-date-submit'])){
            $rentDate=$_POST['rent-date'];
            $date = new DateTime($rentDate);
            $now = new DateTime();
            if($date <= $now) {
                echo 
                '
                    <script>document.getElementById("alerts").innerHTML=`
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          Please Enter a valid date!
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    `;</script>
                ';
            }else{
                $walletMoney="SELECT `funds`,`frozen_funds` from `customer` WHERE `userid`='".$_SESSION['userid']."'";
                $walletMoneyResult = mysqli_query($connection, $walletMoney);
                $walletMoneyRow = mysqli_fetch_assoc($walletMoneyResult);
                $freezeCost=$bookCost*0.5;
                if($walletMoneyRow['funds']>=$freezeCost){
                    //new balance
                    $newBalance=$walletMoneyRow['funds']-$freezeCost;
                    $freezeCost=$walletMoneyRow['frozen_funds']+$freezeCost;
                    $updateBalance="UPDATE `customer` SET `frozen_funds`=".$freezeCost.", `funds`=".$newBalance." WHERE `userid`='".$_SESSION['userid']."'";
                    
                    if (mysqli_query($connection, $updateBalance)) {
                                             
                        $insertDate="INSERT INTO `rent_offers`(`renter_id`, `book_id`, `customer_id`, `start_date`, `status`) VALUES ('".$renterId."','".$_GET['id']."','".$_SESSION['userid']."',".$rentDate.",'pending')";

                        if (mysqli_query($connection, $insertDate)) {
                          echo 
                        '
                            <script>document.getElementById("alerts").innerHTML=`
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                  Success! Please wait for the renter\'s approval.
                                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            `;</script>
                        ';
                        } else {
                          echo 
                        '
                            <script>document.getElementById("alerts").innerHTML=`
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                  Error! '.mysqli_error($connection).'
                                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            `;</script>
                        ';
                        }
                    }else{
                        echo 
                        '
                            <script>document.getElementById("alerts").innerHTML=`
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                  Error updating balance! '.mysqli_error($connection).'
                                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            `;</script>
                        ';
                    }
                }else{
                    echo 
                        '
                            <script>document.getElementById("alerts").innerHTML=`
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                  You don\'t have enough money to rent this!
                                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            `;</script>
                        ';
                }
                   
                 
            }
                                                                                                                          
        }

     ?>
</body>

</html>

 
