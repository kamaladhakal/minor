<?php
 if(isset($_POST['sub'])){
  require 'partials/_dbcon.php';
  $phone = $_POST['phone'];
  $age = $_POST['age'];
  $type = $_POST['type'];
 $units = $_POST['units'];
$conn =new mysqli('localhost','root','','request');

if($conn->connect_error){
  die('Conncetion Failed :'.$conn->connect_error); 
}else{
  // $sql="insert into request (phone,age,type,units) values ('$phone','$age','$type',' $units')";
  // $sqlres=mysqli_query($connect, $sql);
 
  $stmt = $conn->prepare("insert into request(phone,age,type,units)values(?,?,?,?)");
$stmt->bind_param("iisi",$phone,$age,$type,$units);
$stmt->execute();

$stmt->close();
$conn->close();
}
}
echo"successufuly requested";

?>