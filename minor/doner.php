<?php
  // if(isset($_POST['sub'])){
  //   require 'partials/_dbcon.php';
  $phone = $_POST['phone'];
  $age = $_POST['age'];
  $type = $_POST['type'];
  $disease = $_POST['disease'];
$conn =new mysqli('localhost','root','','minor');
if($conn->connect_error){
  die('Conncetion Failed :'.$conn->connect_error); 
}else{
  $stmt = $conn->prepare("insert into doner(phone,age,type,disease)values(?,?,?,?)");
$stmt->bind_param("iiss",$phone,$age,$type,$disease);
$stmt->execute();
echo"requeste is submitted";
$stmt->close();
$conn->close();
}

echo" donation requested is successufuly submmiitted";
?>