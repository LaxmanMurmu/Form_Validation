<?php 
require 'db_connect.php';
$Id=$_GET['id'];

$sql="DELETE FROM `qualification` WHERE id=$Id";
$result=mysqli_query($conn,$sql);



$sq="DELETE FROM `basic_info` WHERE id=$Id";
$res=mysqli_query($conn,$sq);

if($res){
  header("location:show_data.php");
}else{
  echo "your data does not deleted";
}


?>