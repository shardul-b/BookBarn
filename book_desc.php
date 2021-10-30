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
                                //$row = mysqli_fetch_all($result, MYSQLI_NUM);
                              $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                               
    }else{
      //query fails
      echo("Yo");
    }

?>
    <div class="container">
        <div class="row">
            <div class="col-sm-5">
                <div>
                    <!-- <div class="col-md-12 col-lg-5"> -->
                        <!-- <a href="#"></a> -->

    
                        <img src="<?php
                        echo $row['image_url'];
                      ?>" class="image">
                    <!-- </div> -->
                </div>
                <button class="btn-lg btn-primary">Add to Cart</button>
                <button class="btn-lg btn-success ms-3">Buy Now</button>
            </div>
            <div class="col mt-5">
              <h4>  
         <?php 
        echo $row['original_title'];
      
        ?>
      </h4>
               <h5> &#8377; 
         <?php echo  $row['cost'];?>
      </h5>
               
                <p style="color: rgb(1,8,11);">Inclusive of all tax</p>
                <input type="number" min="0" max="5">
                    <button class="btn btn-primary" type="button" style="margin: 35px;background: #ECCD04;color: #210B61;">Add to cart</button>
                    <h3>Book Details</h3>
                    <p style="color: rgb(5,19,27);"><?php 
                    $text=$row['book_details'];
                    $text=preg_replace('/,/',"<br/>",$text,20);
                    echo $text;
              ?></p>
            </div>
        </div>
        <h4 style="color: rgb(33, 37, 41);" class="mt-2">Description</h4>
        <p><?php echo $row['description'];
              ?></p>
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
                     <a href="./index.html" class="text-white">Home</a>
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
</body>

</html>