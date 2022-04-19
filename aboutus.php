<?php 

require('./PHP/connect.php');
session_start();
require('./PHP/common_files.php');
  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>BookBarn: About Us</title>
  </head>
  <body>
    <?php 
        require('./PHP/header.php');
     ?>
<div class="image-aboutus-banner"style="margin-top:70px">
   <div class="container">
    <div class="row">
        <div class="col-md-12">
         <h1 class="lg-text">About Us</h1>
         <!-- <p class="image-aboutus-para">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> -->
         <hr>
       </div>
    </div>
</div>
</div>
<div class="container paddingTB60">
	<div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Post Content -->
            <p class="lead" style="text-align:justify;">
                We have tried to build a platform where a user can avail services such as buy sell and rent book all at the same place and thus providing users with features like ShoppingCart, Product recommendations.The objective is to design a web-based application which would provide users with a variety ofbooks and allow users to buy, sell, rent books with all other services including shopping cart, a recommendation system to recommend books to the user, payment, a responsive user interfaceand other features that a regular E-commerce website has. Thus, reducing user’s efforts to buy abook and saving their time by bringing books to their phones. This would not only allow users to buy books but at the same time boost the sale of physical books.
            </p>
                <hr>

               

            </div>
            <div class="col-lg-4 text-center">
                <img src="./assets/img/booklogo.png" class="border border-default" style="max-width:10em; margin:0 auto">
                <p class="lead">BookBarn</p>
            </div>
        </div>
    </div>
    <div>
        <?php require('./PHP/footer.php'); ?>
      
    </div>

  </body>
  </html>