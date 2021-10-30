<?php 
session_start();
 require('./PHP/connect.php');
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="./bootstrap-5.0.2-dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
        <?php
            require('./PHP/header.php');
        ?>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="login-form mt-4 p-4 bg-light shadow ">
                    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" class="row g-3">
                        <h4>Login</h4>
                        <div class="col-12">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Username">
                        </div>
                        <div class="col-12">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="rememberMe">
                                <label class="form-check-label" for="rememberMe"> Remember me</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" name="login-submit" class="btn btn-primary">Login</button>
                        </div>
                    </form>
                    <hr class="mt-4">
                    <div class="col-12">
                        <p class="text-center mb-0">Have not account yet? <a href="signup.html">Signup</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="./bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
<?php

    if(isset($_POST['login-submit']))
    {
      //something was posted
        $email = $_POST['email'];
        $password = $_POST['password'];

        $email_search = "select * from customer where email='$email'";
        $query = mysqli_query($connection,$email_search);

        $email_count = mysqli_num_rows($query);

        if($email_count){
        
            $user_data = mysqli_fetch_assoc($query);
                if($user_data['password'] === $password){
                echo"login sucess";
                    $_SESSION['userid']=$user_data['userid'];
                
                echo'<script>
             location.href="./index.php";
                </script>';
                
            }else{
                echo"invalid";
            }

           
         }
    }
?>


       
</body>
</html>
