 <?php 
 require('./PHP/connect.php');
  
      session_start();
   ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="./bootstrap-5.0.2-dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
    <h2>Featured Books</h2>
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
                $sql = "SELECT * FROM books where average_rating>4 ORDER BY original_title LIMIT 10";
              
                            if($result = mysqli_query($connection, $sql)){
                                //$row = mysqli_fetch_all($result, MYSQLI_NUM);
                                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                   echo'
            <div class="col-lg-4 d-inline-block">
                <div class="card " style="width: 18rem;">
                    <div class="ratio ratio-4x3" style="object-fit: cover;">
                        <img src='.$row["image_url"].' class="card-img-top py-2" style="object-fit: contain;"   alt="image">
                    </div>
                    <div class="card-body">
                      <h5 class="card-title">'.$row["original_title"].'  </h5>
                      <div class="rating">
                        <i class="fas fa-star" style="color: #ffcc33;"></i>
                        <i class="fas fa-star" style="color: #ffcc33;"></i>
                        <i class="fas fa-star" style="color: #ffcc33;"></i>
                        <i class="fas fa-star-half-alt" style="color: #ffcc33;"></i>
                        <i class="far fa-star" style="color: #ffcc33;"></i>
                      </div>
                      <p class="card-text">'.$row["cost"].' </p>

                      <a href="book_desc.php?id='.$row["book_id"].'" class="btn btn-primary d-block">View Product</a> 
                    </div>
                </div>
            </div>';
          }
        }
          else{
            echo"error";
          }

          ?>


            <!-- <div class="col-lg-4 d-inline-block">
                <div class="card" style="width: 18rem;">
                  <div class="ratio ratio-4x3" style="object-fit: cover;">
                      <img src="https://images-na.ssl-images-amazon.com/images/I/71DeS+Fk6ZS.jpg" class="card-img-top py-2" style="object-fit: contain;"   alt="image">
                  </div>
                  <div class="card-body">
                      <h5 class="card-title">Book Name</h5>
                      <div class="rating">
                          <i class="fas fa-star" style="color: #ffcc33;"></i>
                          <i class="fas fa-star" style="color: #ffcc33;"></i>
                          <i class="far fa-star" style="color: #ffcc33;"></i>
                          <i class="far fa-star" style="color: #ffcc33;"></i>
                          <i class="far fa-star" style="color: #ffcc33;"></i>
                    </div>
                    <p class="card-text">&#8377;350</p>
                    <a href="#" class="btn btn-primary d-block">View Product</a>
                  </div>
                </div>
            </div>
            <div class="col-lg-4 d-inline-block">
                <div class="card" style="width: 18rem;">
                  <div class="ratio ratio-4x3" style="object-fit: cover;">
                      <img src="https://images-na.ssl-images-amazon.com/images/I/71DeS+Fk6ZS.jpg" class="card-img-top py-2" style="object-fit: contain;"   alt="image">
                  </div>
                  <div class="card-body">
                      <h5 class="card-title">Book Name</h5>
                      <div class="rating">
                          <i class="fas fa-star" style="color: #ffcc33;"></i>
                          <i class="fas fa-star" style="color: #ffcc33;"></i>
                          <i class="far fa-star" style="color: #ffcc33;"></i>
                          <i class="far fa-star" style="color: #ffcc33;"></i>
                          <i class="far fa-star" style="color: #ffcc33;"></i>
                    </div>
                    <p class="card-text">&#8377;350</p>
                    <a href="#" class="btn btn-primary d-block">View Product</a>
                  </div>
                </div>
            </div>
            <div class="col-lg-4 d-inline-block">
                <div class="card" style="width: 18rem;">
                  <div class="ratio ratio-4x3" style="object-fit: cover;">
                      <img src="https://images-na.ssl-images-amazon.com/images/I/71DeS+Fk6ZS.jpg" class="card-img-top py-2" style="object-fit: contain;"   alt="image">
                  </div>
                  <div class="card-body">
                      <h5 class="card-title">Book Name</h5>
                      <div class="rating">
                          <i class="fas fa-star" style="color: #ffcc33;"></i>
                          <i class="fas fa-star" style="color: #ffcc33;"></i>
                          <i class="far fa-star" style="color: #ffcc33;"></i>
                          <i class="far fa-star" style="color: #ffcc33;"></i>
                          <i class="far fa-star" style="color: #ffcc33;"></i>
                    </div>
                    <p class="card-text">&#8377;350</p>
                    <a href="#" class="btn btn-primary d-block">View Product</a>
                  </div>
                </div>
            </div>
            <!-- </div>       -->
        <!-- </div> -->
    </div> 
</div> 
</div>
<div class="products-section">

    <h2>Trending Fiction Books</h2>
    <hr>





    <div class="container my-5">
        <div class="row d-block featured" style=" white-space: nowrap; overflow-x:auto; ">
          <?php
                $sql_fiction = "SELECT * FROM books where genre = 'Fiction'";
              
                            if($result = mysqli_query($connection, $sql_fiction)){
                                //$row = mysqli_fetch_all($result, MYSQLI_NUM);
                                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                   echo'
                                            <div class="col-lg-4 d-inline-block my-2">
                                                <div class="card" style="width: 18rem;">
                                                    <div class="ratio ratio-4x3" style="object-fit: cover;">
                                                        <img src='.$row["image_url"].' class="card-img-top py-2" style="object-fit: contain;"   alt="image">
                                                    </div>
                                                    <div class="card-body">
                                                        <h5 class="card-title">'.$row["original_title"].'</h5>
                                                        <div class="rating">
                                                            <i class="fas fa-star" style="color: #ffcc33;"></i>
                                                            <i class="fas fa-star" style="color: #ffcc33;"></i>
                                                            <i class="fas fa-star" style="color: #ffcc33;"></i>
                                                            <i class="fas fa-star" style="color: #ffcc33;"></i>
                                                            <i class="far fa-star" style="color: #ffcc33;"></i>
                                                      </div>
                                                      <p class="card-text"> '.$row["cost"].' </p>
                                                      <a href="book_desc.php?id='.$row["book_id"].'" class="btn btn-primary d-block">View Product</a>
                                                    </div>
                                                </div>
                                            </div>';

}
}
?>
    </div>
</div>
</div>
<!-- Footer -->
   <!-- Remove the container if you want to extend the Footer to full width. -->
   <div class="mt-5">
     <!-- Footer -->
     <footer class="text-center text-white" style="background-color: #3f51b5">
       <!-- Grid container -->
       <div class="container">
         <!-- Section: Links -->
         <section class="mt-5">
           <!-- Grid row-->
           <div class="row text-center d-flex justify-content-center pt-5">
             <!-- Grid column -->
             <div class="col-md-2">
               <h6 class="text-uppercase font-weight-bold">
                 <a href="#!" class="text-white">Home</a>
               </h6>
             </div>
             <!-- Grid column -->

             <!-- Grid column -->
             <div class="col-md-2">
               <h6 class="text-uppercase font-weight-bold">
                 <a href="#!" class="text-white">About us</a>
               </h6>
             </div>
             <!-- Grid column -->

             <!-- Grid column -->
             <div class="col-md-2">
               <h6 class="text-uppercase font-weight-bold">
                 <a href="#!" class="text-white">Books</a>
               </h6>
             </div>
             <!-- Grid column -->

             <!-- Grid column -->
             <div class="col-md-2">
               <h6 class="text-uppercase font-weight-bold">
                 <a href="#!" class="text-white">Blog</a>
               </h6>
             </div>
             <!-- Grid column -->

             <!-- Grid column -->
             <div class="col-md-2">
               <h6 class="text-uppercase font-weight-bold">
                 <a href="#!" class="text-white">Contact</a>
               </h6>
             </div>
             <!-- Grid column -->
           </div>
           <!-- Grid row-->
         </section>
         <!-- Section: Links -->

         <hr class="my-5" />

         <!-- Section: Text -->
         <section class="mb-5">
           <div class="row d-flex justify-content-center">
             <div class="col-lg-8">
               <p>
                 Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt
                 distinctio earum repellat quaerat voluptatibus placeat nam,
                 commodi optio pariatur est quia magnam eum harum corrupti
                 dicta, aliquam sequi voluptate quas.
               </p>
             </div>
           </div>
         </section>
         <!-- Section: Text -->

         <!-- Section: Social -->
         <section class="text-center mb-5">
           <a href="" class="text-white me-4">
             <i class="fab fa-facebook-f"></i>
           </a>
           <a href="" class="text-white me-4">
             <i class="fab fa-twitter"></i>
           </a>
           <a href="" class="text-white me-4">
             <i class="fab fa-instagram"></i>
           </a>

         </section>
         <!-- Section: Social -->
       </div>
       <!-- Grid container -->

       <!-- Copyright -->
       <div
            class="text-center p-3"
            style="background-color: rgba(0, 0, 0, 0.2)"
            >
         © 2021 Copyright:
         <a class="text-white" href="./index.html"
            >BookBarn</a
           >
       </div>
       <!-- Copyright -->
     </footer>
     <!-- Footer -->
   </div>
   <!-- End of .container -->
    
    <script src="./bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="./JS/script.js"></script> -->
  
</body>
</html>
