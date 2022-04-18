<?php 
    require('./PHP/connect.php');
    session_start();
    require './PHP/common_files.php';
    
    if(isset($_GET['rating_success'])){
        echo '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          Success!
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ';
    }
?>
<!DOCTYPE html>
<html>
<head>
    <!-- <style>
        .carousel-item{
            height: 50vh;
        }
    </style> -->
    <style type="text/css">
      
      .card-title{
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis; 
      }
      img{
        max-width: 100%;
      }
      iframe{
        width: 100%;
        height: 22em;
      }
    </style>
</head>
<body style="height:100vh">
         <?php  
              require('./PHP/header.php');
          ?>
<!-- Advertisement Box -->

<div id="carousel" class="carousel slide carousel-fade " data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
  
    <div class="carousel-inner">
        <!-- Advertisments -->
        <div class="carousel-item active img-fluid ">
          <img src="./assets/img/Banner1.png" class="d-block w-100" alt="Book-image1" style="max-height:60vh; background-size: cover;">
        </div>
        <div class="carousel-item">
          <img src="./assets/img/Banner2.png" class="d-block w-100" alt="Book-image2" style="max-height:60vh; background-size: cover;">
        </div>
        <div class="carousel-item">
          <img src="./assets/img/Banner3.png" class="d-block w-100" alt="Book-image3" style="max-height:60vh; background-size: cover;">
        </div>
    </div>
  <!-- <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button> -->
</div>
<div class="products-section">
    <h2 class="ms-3">Featured Books</h2>
    <hr> 
    <div class="container my-5">
        <div class="row d-block featured" style=" white-space: nowrap; overflow-x:auto; ">
            <!-- <div class="col-lg-4 d-inline-block my-2">
                <div class="card" style="width: 18rem;">
                    <div class="ratio ratio-4x3" style="object-fit: cover;">
                        <img src="https://images-na.ssl-images-amazon.com/images/I/813CNrUAXOS.jpg" class="card-img-top py-2" style="object-fit: contain;"   alt="image">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Book Name</h5>
                        <div class="rating">
                            <i class="fas fa-star" style="color: #ffcc33;"></i>
                            <i class="fas fa-star" style="color: #ffcc33;"></i>
                            <i class="fas fa-star" style="color: #ffcc33;"></i>
                            <i class="fas fa-star" style="color: #ffcc33;"></i>
                            <i class="far fa-star" style="color: #ffcc33;"></i>
                      </div>
                      <p class="card-text">&#8377;350</p>
                      <a href="./book_desc.html?id=[]" class="btn btn-primary d-block">View Product</a>
                    </div>
                </div>
            </div> -->
            <?php
                $sql = "SELECT * FROM books where `original_title`!= '' AND  average_rating>4  LIMIT 10";
                if($result = mysqli_query($connection, $sql)){
                    //$row = mysqli_fetch_all($result, MYSQLI_NUM);
                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        // print_r($row);
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
                                $rating='
                                <i class="far fa-star" style="color: #ffcc33;"></i>
                                <i class="far fa-star" style="color: #ffcc33;"></i>
                                <i class="far fa-star" style="color: #ffcc33;"></i>
                                <i class="far fa-star" style="color: #ffcc33;"></i>
                                <i class="far fa-star" style="color: #ffcc33;"></i>';
                                break;
                        }
                       echo'
                        <div class="col-lg-4 d-inline-block">
                            <a href="book_desc.php?id='.$row["book_id"].'" class="text-decoration-none link-dark">
                                <div class="card " style="width: 18rem;">
                                    <div class="ratio ratio-4x3" style="object-fit: cover;">
                                        <img src='.$row["image_url"].' class="card-img-top py-2" style="object-fit: contain;"  alt="image">
                                    </div>
                                    <div class="card-body">
                                      <h5 class="card-title">'.$row["original_title"].'  </h5>
                                      <div class="rating">
                                         '.$rating.'
                                      </div>
                                      <p class="card-text">&#8377;'.$row["cost"].' </p>
                                      <a href="index.php?id='.$row["book_id"].'" class="btn btn-primary d-block">Add To Cart</a> 
                                    </div>
                                </div>
                            </a>    
                        </div>';
                    }
                }else{
                    echo"error";
                }
            ?>
        </div> 
    </div> 
</div>
<!-- Recommended Books -->
<?php 
    if(isset($_SESSION['userid'])){
        echo
        '
            <div class="products-section">
                <h2 class="ms-3">Some Books you might like..</h2>
                <hr>
                <div class="container my-5">
                    <iframe src="./collaborative.php" loading="lazy" title="Recommended Books"></iframe>   
                </div>
                
            </div>
        ';
    }
 ?>

<div class="products-section">
    <h2 class="ms-3">Trending Fiction Books</h2>
    <hr>
    <div class="container my-5">
        <div class="row d-block featured" style=" white-space: nowrap; overflow-x:auto; ">
            <?php
                $sql_fiction = "SELECT * FROM books where categories = 'Fiction'";
              
                if($result = mysqli_query($connection, $sql_fiction)){
                    $rating='';
                    //$row = mysqli_fetch_all($result, MYSQLI_NUM);
                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
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
                       echo'
                        <div class="col-lg-4 d-inline-block my-2">
                            <a href="book_desc.php?id='.$row["book_id"].'" class="text-decoration-none link-dark">
                                <div class="card" style="width: 18rem;">
                                    <div class="ratio ratio-4x3" style="object-fit: cover;">
                                        <img src='.$row["image_url"].' class="card-img-top py-2" style="object-fit: contain;"   alt="image">
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">'.$row["original_title"].'</h5>
                                        <div class="rating">
                                         '.$rating.'
                                      </div>
                                      <p class="card-text">&#8377;'.$row["cost"].' </p>
                                      <a href="index.php?id='.$row["book_id"].'" class="btn btn-primary d-block">Add To Cart</a>
                                    </div>
                                </div>
                            </a>
                        </div>';

                    }
                }
            ?>
        </div>
    </div>
</div>
<div class="products-section">
    <h2 class="ms-3">Trending Biography Books</h2>
    <hr>
    <div class="container my-5">
        <div class="row d-block featured" style=" white-space: nowrap; overflow-x:auto; ">
            <?php
                $sql_fiction = "SELECT * FROM books where categories = 'Biography & Autobiography'";
              
                if($result = mysqli_query($connection, $sql_fiction)){
                    $rating='';
                    //$row = mysqli_fetch_all($result, MYSQLI_NUM);
                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
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
                       echo'
                        <div class="col-lg-4 d-inline-block my-2">
                            <a href="book_desc.php?id='.$row["book_id"].'" class="text-decoration-none link-dark">
                                <div class="card" style="width: 18rem;">
                                    <div class="ratio ratio-4x3" style="object-fit: cover;">
                                        <img src='.$row["image_url"].' class="card-img-top py-2" style="object-fit: contain;"   alt="image">
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">'.$row["original_title"].'</h5>
                                        <div class="rating">
                                         '.$rating.'
                                      </div>
                                      <p class="card-text">&#8377;'.$row["cost"].' </p>
                                      <a href="index.php?id='.$row["book_id"].'" class="btn btn-primary d-block">Add To Cart</a>
                                    </div>
                                </div>
                            </a>
                        </div>';

                    }
                }
            ?>
        </div>
    </div>
</div>
<?php 
  include './PHP/footer.php';
 ?>

<!-- <script src="./JS/script.js"></script> -->
<?php
    if(isset($_GET['id'])){
        if(!isset($_SESSION['userid'])){
            echo "<script> location.href='./login.php'; </script>";
        }else{
            $SQL = "INSERT INTO cart (cust_id,book_id,quantity) VALUES ('". $_SESSION['userid'] ."','". $_GET['id'] ."',1)";  
            $result = mysqli_query($connection,$SQL) or die('Invalid query:'.mysqli_error($connection));
        }
    }
?>  
</body>
</html>
