<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>log in</title>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>

    <div class="container">
    <div> 
            <h1>Log in.</h1>
          
            <form method="POST">
                <label for="">Enter username : </label><br>
                <input type="text" name="getusername"><br>
                <label for="">Enter password : </label><br>
                <input type="password" name="getpass"><br><br>
                <button type="submit" name="sub">Log in</button>
            </form>

            <?php
           if(isset($_POST['sub'])){
            require 'partials/_dbcon.php';
            
            $getusername=$_POST['getusername'];
            $getpassword=$_POST['getpass'];
           
            $sql1="select * from signup where username = '$getusername' and password='$getpassword';";
            $sqlres=mysqli_query($connect, $sql1);
            $countrows=mysqli_num_rows($sqlres);

            if($countrows == 0){
                echo "account not available. Please <a href='index.php'>Sign Up.</a>";
            }else{
                session_start();
                $_SESSION['loggedin']=true;
                $_SESSION['sendusername']=$getusername;
                header("location: dashboard.php");
            }
           }
         ?>
       </div>
    </div>
</body>

</html>