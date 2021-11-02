<?php 
echo'
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
          <div class="container-fluid">
            <a class="navbar-brand" href="./index.php">BookBarn</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">About us</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="./categories.php">Categories</a>
                </li>
                <!--<li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Categories
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="./categories.php">Category-1</a>
                    </li>
                    <li><a class="dropdown-item" href="./categories.php">Category-2</a>
                    </li>
                    <li><a class="dropdown-item" href="./categories.php">Category-3</a>
                    </li>
                  </ul>
                </li>-->
                <li class="nav-item">
                  <a class="nav-link" href="./Blog/index.php">Blog</a>
                </li>
                
              </ul>
              <div class="d-flex">
                <input class="form-control me-2" id="search-value" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success"  id="search-button">Search</button>
              </div>'
              .(!(isset($_SESSION["userid"]))?'
              <a href="./login.php" class="btn btn-primary ms-4">
                  SIGN IN
              </a>':'
              <a href="./account.php" class="btn btn-primary ms-4">
                  My Account
              </a>
              <a href="./cart.php" class="btn btn-success ms-3">
                  My Cart
              </a>
              ').'
            </div>
          </div>
        </nav>';
 ?>
<script src="./JS/search.js"></script>