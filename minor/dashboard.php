<?php
  session_start();
  if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
  }
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/dashstyle.css">
  <title><?php echo "Welcome ".$_SESSION['sendusername'];?></title>
</head>

<body>
    <div class="form1">
     <span><?php echo "Welcome ".$_SESSION['sendusername'];?></span>
     <form method="POST">
        <button type="submit" name="logoutsub">Log out</button>
     </form>
     <?php
       if(isset($_POST['logoutsub'])){
         session_unset();
         session_destroy();

         header("location: index.php");
         exit;
       }
     ?>
    </div>
    <div class="biteam">
    <button id="myButton">request</button>

<script type="text/javascript">
    document.getElementById("myButton").onclick = function () {
        location.href = "request.html";
    };
</script>
    <!-- <button><a href="order.html">order</a></button> -->
    <button><a href="doner.html">donate</a></button>
     
    </div>
     

<!-- 
<form method="POST">
        <button type="submit" name="destroysub">Delete account</button>
     </form>
     </div>
     <?php
       if(isset($_POST['destroysub'])){
        require 'partials/_dbcon.php';
        $getusername=$_SESSION['sendusername'];
        $sql="delete from signup where user_name = '$getusername'";
        $sqlres=mysqli_query($connect, $sql);
        session_unset();
        session_destroy();
        
        header("location: login.php");
        exit;
       }
     ?> -->

</body>
</html>