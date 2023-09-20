<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign up</title>
    <link rel="stylesheet" href="css/signup.css">
</head>
<body>
 
  <div class="container">
 
      <div class="form">   
      <h1>Sign up.</h1>
      <form method="POST">
        
         <label for="">Enter username : </label><br>
         <input type="text" name="getusername"><br>

         <label for="">Enter you email: </label><br>
         <input type="email" name="getemail"><br>

         <label for="">Enter password : </label><br>
         <input type="password" name="getpass"><br>

         <label for="">Confirm password : </label><br>
         <input type="password" name="conpass"><br><br>

         <button type="submit" name="sub">Sign Up</button>
       
      </form>

      <?php
        if(isset($_POST['sub'])){
         require 'partials/_dbcon.php';
        //  $getusername =filter_input(INPUT_POST,"getusername",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
          $getusername=$_POST['getusername'];
     $getemail=$_POST['getemail'];
         $getpass=$_POST['getpass'];
         $conpass=$_POST['conpass'];


if (preg_match('/^\w{5,}$/', $getusername)) {
    echo"enter a valid username";
    // The username is valid; it contains only alphanumeric characters and is at least 5 characters long.
} else {
    // The username is invalid; it does not meet the required criteria.


  
         $sql="select username from signup where username = '$getusername'";
         $sqlres=mysqli_query($connect, $sql);
         $rowcount=mysqli_num_rows($sqlres);

         if($rowcount !=0){

             echo "<p>User name is not available. Try another one</p>";
         }
         if($getpass != $conpass){
             echo "Confirm password properly";
         }}
         if(($rowcount ==0) && ($getpass == $conpass)){
             echo "You have successfully signed up.";
             $gotologin = "<a href='login.php'>Log in.</a>";
             echo $gotologin;
             $sql="insert into signup (username,email,password) values ('$getusername','$getemail','$getpass')";
             $sqlres=mysqli_query($connect, $sql);
            
         }
        }
      ?> 
    </div>
   </div>

   
</body>
</html>