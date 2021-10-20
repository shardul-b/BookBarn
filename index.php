 <?php 
 require('./PHP/connect.php');
        if (isset($_GET['action'])) {
            echo'<script>
            location.reload();
            location.href="./account.php?userid='.$_GET['id'].'"
            </script>';
        }else if (isset($_GET['result'])) {
            echo'<script>
            location.reload();
            location.href="./project.php?id='.$_GET['project_id'].'"
            </script>';
        }

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
</head>
<body style="height:100vh">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
          <div class="container-fluid">
            <a class="navbar-brand" href="./index.html">BookBarn</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="./index.html">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">About us</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Categories
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="./categories.html">Category-1</a>
                    </li>
                    <li><a class="dropdown-item" href="./categories.html">Category-2</a>
                    </li>
                    <li><a class="dropdown-item" href="./categories.html">Category-3</a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./Blog/index.html">Blog</a>
                </li>
                
              </ul>
              <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <a href="./search.html" class="btn btn-outline-success" type="submit" >Search</a>
              </form>
              <a href="./login.html" class="btn btn-primary ms-4">
                  SIGN IN
              </a>
            </div>
          </div>
        </nav>
<!-- Advertisement Box -->

<div id="carousel" class="carousel slide carousel-fade " data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <?php
   $repeat = mysqli_query($connection, $searchquery);
            if (mysqli_num_rows($repeat) > 0) {
               // output data of each row
              while($row = mysqli_fetch_assoc($repeat)) 
              {
                <div class="carousel-item active img-fluid ">
      <img src="./assets/img/Banner1.png" class="d-block w-100" alt="Book-image1" style="max-height:60vh; background-size: cover;">
    </div>
  }}
  ?>
  <!-- <div class="carousel-inner">
    <!-- Advertisments -->
   <!--  <div class="carousel-item active img-fluid ">
      <img src="./assets/img/Banner1.png" class="d-block w-100" alt="Book-image1" style="max-height:60vh; background-size: cover;">
    </div>
    <div class="carousel-item">
      <img src="./assets/img/Banner2.png" class="d-block w-100" alt="Book-image2" style="max-height:60vh; background-size: cover;">
    </div>
    <div class="carousel-item">
      <img src="./assets/img/Banner3.png" class="d-block w-100" alt="Book-image3" style="max-height:60vh; background-size: cover;">
    </div> -->
  <!-- </div> --> -->
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
            <div class="col-lg-4 d-inline-block my-2">
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
                      <a href="./book_desc.html" class="btn btn-primary d-block">View Product</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 d-inline-block">
                <div class="card " style="width: 18rem;">
                    <div class="ratio ratio-4x3" style="object-fit: cover;">
                        <img src="https://images-na.ssl-images-amazon.com/images/I/813CNrUAXOS.jpg" class="card-img-top py-2" style="object-fit: contain;"   alt="image">
                    </div>
                    <div class="card-body">
                      <h5 class="card-title">Book Name</h5>
                      <div class="rating">
                        <i class="fas fa-star" style="color: #ffcc33;"></i>
                        <i class="fas fa-star" style="color: #ffcc33;"></i>
                        <i class="fas fa-star" style="color: #ffcc33;"></i>
                        <i class="fas fa-star-half-alt" style="color: #ffcc33;"></i>
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
        </div>
    </div>
</div>
<div class="products-section">
    <h2>Trending Fiction Books</h2>
    <hr>
    <div class="container my-5">
        <div class="row d-block featured" style=" white-space: nowrap; overflow-x:auto; ">
            <div class="col-lg-4 d-inline-block my-2">
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
                      <a href="./book_desc.html" class="btn btn-primary d-block">View Product</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 d-inline-block">
                <div class="card " style="width: 18rem;">
                    <div class="ratio ratio-4x3" style="object-fit: cover;">
                        <img src="https://images-na.ssl-images-amazon.com/images/I/813CNrUAXOS.jpg" class="card-img-top py-2" style="object-fit: contain;"   alt="image">
                    </div>
                    <div class="card-body">
                      <h5 class="card-title">Book Name</h5>
                      <div class="rating">
                        <i class="fas fa-star" style="color: #ffcc33;"></i>
                        <i class="fas fa-star" style="color: #ffcc33;"></i>
                        <i class="fas fa-star" style="color: #ffcc33;"></i>
                        <i class="fas fa-star-half-alt" style="color: #ffcc33;"></i>
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
