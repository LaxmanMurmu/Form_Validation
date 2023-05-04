

<?php 
require 'db_connect.php';
//$conn =mysqli_connect('localhost','root','','employe');

// if(!$conn){
//     die("error".mysqli_connect_error());
// }
 

$Id=$_GET['id'];
// echo $Id;

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
   
//    print_r($_POST);
    
//    $Sql="UPDATE `basic_info`( `firstname`, `lasstname`, `email`, `phone`, `Image`, `designation`) VALUES ('$FName','$Lname','$Email','$phone','$img_des','$designation')";

//    $result=mysqli_query($conn,$Sql);
//     if($result){
//       echo "success";
//     }
//     else{
//       echo "data does not inserted successfully";
//     }




if(!empty($_FILES['image']['tmp_name'])){  //here we are checking user want to update picture then excute 
    $img_loc=$_FILES['image']['tmp_name'];
    $img_name=$_FILES['image']['name'];
    $img_des="uploads/".$img_name;
    move_uploaded_file($img_loc,'uploads/'.$img_name);

    $sql="UPDATE `basic_info` SET `firstname`='$FName',`lasstname`='$Lname',`email`='$Email',`phone`='$phone',`Image`='$img_des',`designation`='$designation' WHERE id=$Id"; 
   }
   else{
    
      $IMAGE1=$_POST["old_image"];
      // echo $IMAGE1;exit;

      $sql="UPDATE `basic_info` SET `firstname`='$FName',`lasstname`='$Lname',`email`='$Email',`phone`='$phone',`Image`='$IMAGE1',`designation`='$designation' WHERE id=$Id"; 
   }
   
   $result=mysqli_query($conn,$sql);
   
    foreach($Class as $index => $cl){
      $c_class = $cl;
      $que_id = $_POST['que_id'][$index];
      $c_board = $Board[$index];
      $c_percentage = $Percentage[$index];
      $c_city = $City[$index];
      $sq="UPDATE `qualification` SET `class`='$c_class',`board`='$c_board',`percentage`='$c_percentage',`city`='$c_city' WHERE `que_id`=$que_id";
        // echo $sq;exit;
      $res=mysqli_query($conn,$sq);
    


    }
    // $sqle="INSERT INTO `qualification`(`id`, `class`, `board`, `percentage`, `city`, `phone`) VALUES ('$id','$c_class','$c_board','$percentage','$c_percentage','$c_city')";
  

     if(!$result){
        echo "data does not inerted";
     }else{
        header("location:show_data.php");
     }

    
    }

?>
























