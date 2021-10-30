<?php 
    session_start();

?>
<!DOCTYPE html>
<html>
<head>
    <link href="./bootstrap-5.0.2-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="./assets/css/account.css" rel="stylesheet" type="text/css"> 

    <!-- <link rel="stylesheet" href="./CSS/header.css"> -->
    <!-- <link rel="stylesheet" href="./CSS/footer.css"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
                if(!isset($_SESSION['userid'])){
                    header('Location:./login.php');
                }
                    $sql = "SELECT * FROM customer WHERE  userid= 8";
                            if($result = mysqli_query($connection, $sql)){
                                //$row = mysqli_fetch_all($result, MYSQLI_NUM);
                                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                    echo'
                                        <div class="Row">
                                            <div class="col-25">
                                                <label for="uname">User Name:</label>
                                            </div>
                                            <div class="col-75">
                                                <input type="text" class="text-input" id="uname" name="username" value="'.$row["username"].'">
                                            </div>
                                        </div>
                                    
                                        <div class="Row">
                                             <div class="col-25">
                                                <label for="email">E-mail Address:</label>
                                            </div>
                                            <div class="col-75">
                                                <input type="text" class="text-input" name="email" id="email" value="'.$row["email"].'">
                                            </div>
                                        </div>
                                        <div class="Row">
                                             <div class="col-25">
                                                <label for="phone">PHONE:</label>
                                            </div>
                                            <div class="col-75">
                                                <input type="tel" class="text-input" name="phone" id="phone" value="'.$row["phone"].'">
                                            </div>
                                        </div>
                                        <div class="Row">
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
                                        <div class="Row">
                                            <form mehod="post">
                                                <button name="edit" class="button-style">EDIT</button>
                                                </form>
                                                <button name="logout" class="logout button-style">LOGOUT</button>
                                        </div>
                                    ';
                                }
                            }

                ?>
            </form>
        </div>
    </div>

    <div class="mid">
        <!-- <div class="container-box"> -->
            <!-- Order DB -->
            <h2>Order Details</h2>
            <?php

            ?>
            <div class="products">
        <div class="container">
            <!-- First -->
            <?php
                if(!isset($_SESSION['userid'])){
                    echo "<script> location.href='./login.php'; </script>";
                    exit;
                }
                $sql = "SELECT * FROM `order` WHERE Cust_id = 8";
                $result=mysqli_query($connection,$sql) or die('Invalid query:');
                while($row = mysqli_fetch_assoc($result)){
                    //echo $row['product_id'];
                    $sql2="SELECT * FROM books WHERE book_id=".$row['book_id']."";
                    $result2=mysqli_query($connection,$sql2) or die('Invalid query:');
                    $row2 = mysqli_fetch_assoc($result2);
                    // while($row2 = mysqli_fetch_assoc($result2)){
                        echo'
                            <div class="product-card flex-space">
                                <div class="product-image">
                                    <img src="'.$row2["image_url"].'" alt="Camera" class="image">
                                </div>
                                <div class="product-desc flex">
                                    <span class="name">
                                        '.$row2["original_title"].'
                                    </span>
                                    <span class="quantity">x'.$row["quantity"].'</span>
                                    <span class="cost">&#8377;'.$row["quantity"]*$row2["cost"].'</span>

                                </div>
                                <span class="remove-icon flex" title="Remove from cart"></span>
                            </div>
                            ';
                    // }
                }
                
                /**/
            ?>

            
            <!-- <div class="Row">
                <div class="col-25">

                </div>
            </div> -->
        </div>
    </div>
</div>
    <?php
        if(isset($_POST['edit'])){
            $UserName=$_POST["username"];
            $email=$_POST["email"];
            $phone=$_POST["phone"];
            $Address=$_POST["address"];
            $sql="UPDATE User SET Firstname='$FirstName',Lastname='$LastName',Email='$email',Phone='$phone',Address='$Address' WHERE id = ".$_SESSION['userid']."";
            $result = mysqli_query($connection,$sql) or die('Invalid query:'.mysqli_error($connection));
        }
        if(isset($_POST['logout'])){
            unset($_SESSION['userid']);
            $_SESSION['loggedin']=false;
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
</body>
</html>