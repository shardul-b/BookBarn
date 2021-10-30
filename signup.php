<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="./bootstrap-5.0.2-dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" /> 
    <title>Create Account</title>
</head>
<body>
 
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
  <div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="signup-form">
                <form class="mt-5 border p-4 bg-light shadow" method="POST">
                    <h4 class="mb-5 text-secondary">Create Your Account</h4>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label>First Name<span class="text-danger">*</span></label>
                            <input type="text" name="fname" class="form-control" placeholder="Enter First Name">
                        </div>

                        <div class="mb-3 col-md-6">
                            <label>Last Name<span class="text-danger">*</span></label>
                            <input type="text" name="lname" class="form-control" placeholder="Enter Last Name">
                        </div>
                         <div class="mb-3 col-md-12">
                            <label>Email<span class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control" placeholder="Enter Email">
                        </div>

                        <div class="mb-3 col-md-12">
                            <label>Password<span class="text-danger">*</span></label>
                            <input type="password" name="password" class="form-control" placeholder="Enter Password">
                        </div>
                        <div class="mb-3 col-md-12">
                            <label>Confirm Password<span class="text-danger">*</span></label>
                            <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password">
                        </div>
                        <div class="col-md-12">
                           <button class="btn btn-primary" name="signup-submit">Signup</button>
                               
                        </div>
                    </div>
                </form>
                <p class="text-center mt-3 text-secondary">If you have account, Please <a href="login.html">Login Now</a></p>
            </div>
        </div>
    </div>
</div>

    <script src="./bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>

      <?php
        require('PHP/connect.php');
        
   

// If the values are posted, insert them into the database.
 if(isset($_POST['signup-submit']))
{
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $username= $firstname.' '.$lastname;
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];
    $query = "SELECT 1 FROM customer WHERE email = '$email'";
    $selectresult = mysqli_query($connection, "SELECT 1 FROM customer WHERE email = '$email'");
    if(mysqli_num_rows($selectresult)>0)
    {
         $msg = 'email already exists';

    }
    // else if($password != $cpassword){
    //        $msg = 'password dont match';
    //         echo($msg);
    //  }
    else{

          
          $query = "INSERT INTO customer (username,email,password) VALUES ('$username', '$email', '$password')";
          $result = mysqli_query($connection,$query);
          if($result){
             $msg = "User Created Successfully.";
          }else{
            echo(mysqli_error($connection));
          }
    }
   }

?>

</body>
</html>