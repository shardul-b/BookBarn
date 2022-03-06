<?php 
  require './PHP/common_files.php';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <a href="./try.php?success=true">Submit</button>
    <script src="./JS/result.js"></script>
</body>
</html>


<?php 
  if($_GET['success']==true){
      echo'
      <script>
        alert("Sucesss","success","false")
      </script>';   
  }
 ?>


