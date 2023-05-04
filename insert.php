<?php 
require 'db_connect.php';
//$conn =mysqli_connect('localhost','root','','employe');

// if(!$conn){
//     die("error".mysqli_connect_error());
// }


 if(isset($_POST['submit'])){

   $FName=$_POST['fname'];
   $Lname=$_POST['lname'];
   $Email=$_POST['email'];
   $phone=$_POST['number'];
  //  $IMAGE=$_FILES['image'];
    //print_r($_FILES['image']);
    $img_loc=$_FILES['image']['tmp_name'];
    $img_name=$_FILES['image']['name'];
    $img_des="uploads/".$img_name;
    move_uploaded_file($img_loc,'uploads/'.$img_name);
    $designation=$_POST['desig']; 

    $Class=$_POST['cls'];
    $Board=$_POST['board'];
    $Percentage=$_POST['percentage'];
    $City=$_POST['city'];
   
   print_r($_POST);
    
   $Sql="INSERT INTO `basic_info`( `firstname`, `lasstname`, `email`, `phone`, `Image`, `designation`) VALUES ('$FName','$Lname','$Email','$phone','$img_des','$designation')";

   $result=mysqli_query($conn,$Sql);
    if(!$result){
      echo "data does not inserted successfully";
    }



    foreach($Class as $index => $cl){
      $c_class = $cl;
      $c_board = $Board[$index];
      $c_percentage = $Percentage[$index];
      $c_city = $City[$index];
      

    $query = "SELECT id FROM basic_info ORDER BY id DESC LIMIT 1";
    $result = mysqli_query($conn, $query);
    if($result){
      $row =mysqli_fetch_assoc($result);
      $id = $row['id'];
      echo $id;
    }else{                                                                                                              
      $id=0;
    }


    // $sqle="INSERT INTO `qualification`(`id`, `class`, `board`, `percentage`, `city`, `phone`) VALUES ('$id','$c_class','$c_board','$percentage','$c_percentage','$c_city')";
    $sqle ="INSERT INTO `qualification`(`id`, `class`, `board`, `percentage`, `city`) VALUES ('$id','$c_class','$c_board','$c_percentage','$c_city')";

    $res=mysqli_query($conn, $sqle);
  
   if($res){
    header("location:show_data.php");
   }else{
    header("location:index.php");
   }

   
   }
   
  }

?>