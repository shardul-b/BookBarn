<?php
	 require('./PHP/connect.php');
	 require('./PHP/header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="./bootstrap-5.0.2-dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<title>Search</title>
	<link rel="stylesheet" href="assets/fonts/ionicons.min.css"><link rel="stylesheet" href="assets/css/Brands.css"><link rel="stylesheet" href="assets/css/Projects-Horizontal.css"><link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>

	<div class="container">
		
<?php

				$searchterm=$_GET['value'];
                
                $sql="SELECT * FROM books WHERE original_title LIKE '%$searchterm%' OR genre='$searchterm'";
          
               $result=mysqli_query($connection,$sql);
					if(mysqli_num_rows($result)<=0){		
				while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
					echo'
					
        <div class="row py-3 border-bottom border-default">
            <div class="col-md-2 col-4 d-flex justify-content-end ">
                <img src="assets/img/b3.jpeg" class="" alt="Image" style=" max-height:12em; ">
            </div>
            <div class="col-md-8 col-6">
            		<div class="card border-0">
                  			<div class="card-body">
		                    		<a href="./book_desc.php"></a>
		                    		<h5 class="card-title">'.$row["original_title"].' <footer></h5>
		                    <div>
                    	<i class="fa fa-star" style="color: var(--bs-yellow);">
                    		</i>
                    	<i class="fa fa-star" style="color: var(--bs-yellow);">
                    	</i>
                    	<i class="fa fa-star" style="color: var(--bs-yellow);">
                    	</i>
                    	<i class="fa fa-star" style="color: var(--bs-yellow);">
                    	</i>
                    	<i class="fa fa-star" style="color: var(--bs-yellow);">
                    	</i>
                    </div>
                    <span class="card-text d-block">cost</h5></span>
                    <span style="color: var(--bs-indigo);">In Stock</span>
                    <div class="d-flex py-2">
                        <a href="#" type="button" class="btn btn-primary">ADD TO CART</a>
                        <a href="#" class="btn btn-success ms-2">BUY NOW</a>
                  	</div>
                  </div>
                </div>';
   		 }
	}
else{
            echo"error";
          }

       ?>
</div>
       

<footer>

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
		             <i class="fab fa-facebook-f">
		             </i>
		           </a>
		           <a href="" class="text-white me-4">
		             <i class="fab fa-twitter">
		             </i>
		           </a>
		           <a href="" class="text-white me-4">
		             <i class="fab fa-instagram">
		             </i>
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
    <script src="./bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js">
    </script>

</body>
</html>