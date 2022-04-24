<?php 
    session_start();
    require'./PHP/common_files.php';
?>
<!DOCTYPE html>
<html>
<head>
    <link href="./assets/css/account.css" rel="stylesheet" type="text/css"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <!-- <header> -->
        <?php
            require './PHP/connect.php';
            include './PHP/header.php';
        ?>
    <!-- </header> --> 

    <div class="top">
        <div class="container-box">
            <h2> Profile Details</h2>
            <form action="" method="post">
                <?php
                $funds=0;
                $frozenFunds=0;
                if(!isset($_SESSION['userid'])){
                    header('Location:./login.php');
                }
                    $sql = "SELECT * FROM customer WHERE  userid=".$_SESSION['userid'];
                            if($result = mysqli_query($connection, $sql)){
                                //$row = mysqli_fetch_all($result, MYSQLI_NUM);
                                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                                $funds=$row["funds"];
                                $frozenFunds=$row["frozen_funds"];
                                    echo'
                                        <div class="row">
                                            <div class="col-25">
                                                <label for="uname">User Name:</label>
                                            </div>
                                            <div class="col-75">
                                                <input type="text" class="text-input" id="uname" name="username" value="'.$row["username"].'">
                                            </div>
                                        </div>
                                    
                                        <div class="row">
                                             <div class="col-25">
                                                <label for="email">E-mail Address:</label>
                                            </div>
                                            <div class="col-75">
                                                <input type="text" class="text-input" name="email" id="email" value="'.$row["email"].'">
                                            </div>
                                        </div>
                                        <div class="row">
                                             <div class="col-25">
                                                <label for="phone">Phone:</label>
                                            </div>
                                            <div class="col-75">
                                                <input type="tel" class="text-input" name="phone" id="phone" value="'.$row["phone"].'">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-25">
                                                <label for="address">Address:</label>
                                            </div>
                                            <div class="col-75">
                                                <input type="text" class="text-input" id="address" name="address"
                                                    value="'.$row["address"]
                                                    .'"
                                                >
                                                    
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-25">
                                                <label for="password">Password:</label>
                                            </div>
                                            <div class="col-75 input-group">
                                                <input type="password" class="form-control" id="password" name="password"
                                                    value="'.$row["password"]
                                                    .'"
                                                >
                                                <div class="px-2 py-2 mx-1" id="password-eye">
                                                    <span class="fas fa-eye-slash d-none" id="hide-pass"></span>
                                                    <span class="fas fa-eye" id="display-pass"></span>
                                                </div>
                                                    
                                            </div>
                                        </div>
                                        <div class="Row my-4">
                                            <form mehod="post">
                                                <button name="edit" class="btn btn-outline-success">EDIT</button>
                                                </form>
                                                <button name="logout" class="btn btn-outline-danger">LOGOUT</button>
                                        </div>

                                    ';
                            }

                ?>
            </form>
        </div>
    </div>
        <div class="top">
           <div class="container-box">
                <h2> Wallet details </h2>
                <p>Available wallet funds</p>
                <div class="d-inline p-2 bg-primary text-white d-flex mb-3 w-25 ">
                    <h5>&#8377;
                    <?php 
                        echo $funds;
                    ?>  
                    </h5>
                </div>
                <p>Frozen funds</p>
                <div class="d-inline p-2 bg-secondary text-white d-flex mb-3 w-25 ">
                    <h5>&#8377;
                    <?php 
                        echo $frozenFunds;
                    ?>
                    </h5>
                </div>
                 <a href="./funds.php?action=add" class="btn btn-success mr-2">Add funds </a>
                 <a href="./funds.php?action=withdraw" class="btn btn-primary">Withdraw</a>
            <!-- </div> -->
            </div>
        </div>
    <div class="top">
        <div class="container-box">
            <h2> Rent or sell Books </h2>
            <a href="./rentform.php" role="button" class="btn btn-primary me-4"> 
               Rent a book
            </a>
            <a href="./sellerform.php" role="button" class="btn btn-secondary"> 
               Sell a book
            </a>
        </div>
    </div>
    <div class="mid">
        <!-- <div class="container-box"> -->
            <!-- Order DB -->
            <h2 class="ms-3">Order Details</h2>
            
            <div class="products">
                
                <div class="container">
                    <!-- First -->
                    <?php
                        if(!isset($_SESSION['userid'])){
                            echo "<script> location.href='./login.php'; </script>";
                            exit;
                        }
                        $sql = "SELECT * FROM `orders` WHERE Cust_id =".$_SESSION['userid'];
                        $result=mysqli_query($connection,$sql) or die(mysqli_error($connection));
                        if(mysqli_num_rows($result)<1){
                            echo"No Books Available!";
                        }
                        while($row = mysqli_fetch_assoc($result)){
                            //echo $row['product_id'];
                            $sql2="SELECT * FROM books WHERE book_id=".$row['book_id']."";
                            $result2=mysqli_query($connection,$sql2) or die('Invalid query:');
                            $row2 = mysqli_fetch_assoc($result2);
                            // while($row2 = mysqli_fetch_assoc($result2)){
                                echo'
                                <div class="row shadow my-2">
                                    <div class="col-md-2 col-4 d-flex align-items-center justify-content-end">
                                        <img src="'.$row2["image_url"].'" alt="Image" style=" max-height:6.2em;">
                                    </div>
                                    <div class="col-md-8 col-6">
                                        <div class="card border-0">
                                          <!-- <h5 class="card-header">User Name</h5> <--></-->
                                          <div class="card-body">
                                            <span class="card-title">'.$row2["original_title"].'</span>
                                            <p>x'.$row["quantity"].'</p>
                                            <p>&#8377;'.$row["quantity"]*$row2["cost"].'</p>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                            ';
                            // }
                        }
                    ?>
                </div>
            </div>
    </div>
    <div class="mid">
        <h2 class="ms-3">Books on Sale</h2>
        <div class="products">
                
                <div class="container">
                    <!-- First -->
                    <?php
                        if(!isset($_SESSION['userid'])){
                            echo "<script> location.href='./login.php'; </script>";
                            exit;
                        }
                        $sql = "SELECT * FROM `sell_books` WHERE user_id =".$_SESSION['userid'];
                        $result=mysqli_query($connection,$sql) or die(mysqli_error($connection));
                        if(mysqli_num_rows($result)<1){
                            echo"No Books Available!";
                        }
                        while($row = mysqli_fetch_assoc($result)){
                            //echo $row['product_id'];
                            $sql2="SELECT * FROM books WHERE book_id=".$row['book_id']."";
                            $result2=mysqli_query($connection,$sql2) or die('Invalid query:');
                            $row2 = mysqli_fetch_assoc($result2);
                            // while($row2 = mysqli_fetch_assoc($result2)){
                                echo'
                                <div class="row shadow my-2">
                                    <div class="col-md-2 col-4 d-flex align-items-center justify-content-end">
                                        <img src="'.$row2["image_url"].'" alt="Image" style=" max-height:6.2em;">
                                    </div>
                                    <div class="col-md-8 col-6">
                                        <div class="card border-0">
                                          <!-- <h5 class="card-header">User Name</h5> <--></-->
                                          <div class="card-body">
                                            <span class="card-title">'.$row2["original_title"].'</span>
                                            <p>x'.$row2["books_count"].'</p>
                                            <p>&#8377;'.$row2["cost"].'</p>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                            ';
                            // }
                        }
                    ?>
                </div>
            </div>
    </div>
    <div class="mid">
        <h2 class="ms-3">Books on Rent</h2>
        <div class="products">
                
                <div class="container">
                    <!-- First -->
                    <?php
                        if(!isset($_SESSION['userid'])){
                            echo "<script> location.href='./login.php'; </script>";
                            exit;
                        }
                        $sql = "SELECT * FROM `rent` WHERE user_id =".$_SESSION['userid'];
                        $result=mysqli_query($connection,$sql) or die(mysqli_error($connection));
                        if(mysqli_num_rows($result)<1){
                            echo"No Books Available!";
                        }
                        while($row = mysqli_fetch_assoc($result)){
                            //echo $row['product_id'];
                            $sql2="SELECT * FROM books WHERE book_id=".$row['rent_book_id']."";
                            $result2=mysqli_query($connection,$sql2) or die('Invalid query:');
                            $row2 = mysqli_fetch_assoc($result2);
                            // while($row2 = mysqli_fetch_assoc($result2)){
                                echo'
                                <div class="row shadow my-2">
                                    <div class="col-md-2 col-4 d-flex align-items-center justify-content-end">
                                        <img src="'.$row["rent_book_image"].'" alt="Image" style=" max-height:6.2em;">
                                    </div>
                                    <div class="col-md-8 col-6">
                                        <div class="card border-0">
                                          <!-- <h5 class="card-header">User Name</h5> <--></-->
                                          <div class="card-body">
                                            <span class="card-title">'.$row2["original_title"].'</span>
                                            <!--<p>x'.$row["quantity"].'</p>-->
                                            <p>&#8377;'.$row["cost"].'/day</p>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                            ';
                            // }
                        }
                    ?>
                </div>
            </div>
    </div>
    <?php
    // Needs Update
        if(isset($_POST['edit'])){
            $UserName=$_POST["username"];
            $email=$_POST["email"];
            $phone=$_POST["phone"];
            $Address=$_POST["address"];
            $password=$_POST["password"];
            $sql="UPDATE customer SET username='$UserName',email='$email',phone='$phone',address='$Address',password='$password' WHERE  userid = ".$_SESSION['userid']."";
            $result = mysqli_query($connection,$sql) or die('Invalid query:'.mysqli_error($connection));
            echo "<script> location.href='./redirect.php?backTo=account.php'; </script>";
        }
        if(isset($_POST['logout'])){
            unset($_SESSION['userid']);
            session_destroy();
            echo "<script> location.href='./index.php'; </script>";
            exit;
        }
    ?>
    <footer>
        <?php
            // include './PHP/footer.php';
        ?>
    </footer>
    <script>
        document.getElementById('password-eye').addEventListener('click',()=>{
            let display_pass=document.getElementById('display-pass');
            if(!display_pass.classList.contains('d-none')){
                document.getElementById('hide-pass').classList.remove('d-none');
                document.getElementById('password').type="text";
                display_pass.classList.add('d-none')
            }else{
                document.getElementById('hide-pass').classList.add('d-none');
                document.getElementById('password').type="password";
                display_pass.classList.remove('d-none')
            }
            
        });
    </script>
</body>
</html>
