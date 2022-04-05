<?php
  session_start();
  require './PHP/connect.php';
  require'./PHP/common_files.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"> 
    <title>Create Account</title>
    <style>
        .signup-form{
            background-color: #f5f5f5;
        } 
    </style>
</head>
<body>
    <?php 
        require  './PHP/header.php';
     ?>
  <div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="signup-form shadow">
                <form class="mt-5 border p-4 " method="POST">
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
                           <button class="btn btn-primary" name="signup-submit" class="signup-submit-button">Signup</button>
                               
                        </div>
                    </div>
                </form>
                <p class="text-center mt-3 text-secondary">If you have account, Please <a href="login.php">Login Now</a></p>
            </div>
        </div>
    </div>
</div>
    <script src="./JS/login_script.js"></script>
</body>
</html>
<?php
        
// If the values are posted, insert them into the database.
    if(isset($_POST['signup-submit'])){
        $firstname = $_POST['fname'];
        $lastname = $_POST['lname'];
        $username= $firstname.' '.$lastname;
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpassword = $_POST['confirmpassword'];
        $query = "SELECT 1 FROM customer WHERE email = '$email'";
        $selectresult = mysqli_query($connection, "SELECT 1 FROM customer WHERE email = '$email'");
        if(mysqli_num_rows($selectresult)>0){
            $msg = 'email already exists';
        }else{
            $query = "INSERT INTO customer (username,email,password) VALUES ('$username', '$email', '$password')";
            $result = mysqli_query($connection,$query);
            if($result){
                $newuserid=mysqli_insert_id($connection);
                $_SESSION['userid']=$newuserid;
                //Create folder for user
                mkdir('./Uploads/'.$newuserid,0777,true);
                //Create profile folder (future update)
                mkdir('./Uploads/'.$newuserid.'/profile',0777,true);
                //Create book image uploads folder
                mkdir('./Uploads/'.$newuserid.'/books',0777,true);
                
                echo'
                <script>
                  location.href="./choice.php";
                </script>';   
            }else{
                echo(mysqli_error($connection));
            }
        }
       }

?>