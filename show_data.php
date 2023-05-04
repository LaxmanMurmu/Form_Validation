

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All data</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>

<body>
    <header class="header">
        <div class="nav justify-content-center ">
            <div class="conrainer">
                <h1 id="all-detail ">All detail</h1>
            </div>
        </div>

    </header>
    <div class="container" id="main-page">
        <?php 
        include 'db_connect.php';
        
        $sql= "SELECT basic_info.id, basic_info.firstname, basic_info.lasstname, basic_info.email, basic_info.phone, basic_info.image, basic_info.designation, qualification.id, qualification.class, qualification.board, qualification.percentage, qualification.city FROM basic_info LEFT JOIN qualification ON basic_info.id=qualification.id GROUP BY qualification.id";

                
        // $query = "SELECT basic_info.id,basic_info.firstname,basic_info.lasstname,basic_info.email,basic_info.phone,basic_info.image,basic_info.designation,qualification.id,qualification.class,qualification.board,qualification.percentage,qualification.city FROM basic_info  LEFT JOIN qualification ON basic_info.id=qualification.id GROUP BY qid";


        // $sql= "SELECT basic_info.id, basic_info.firstname, basic_info.lasstname, basic_info.email, basic_info.phone, basic_info.image, basic_info.designation, qualification.id as qid, qualification.class, qualification.board, qualification.percentage, qualification.city FROM basic_info LEFT JOIN qualification ON basic_info.id=qualification.id GROUP BY qid";



        $result = mysqli_query($conn, $sql);

        $num = mysqli_num_rows($result);
        $nums=0;
        
        if($num>0){
             $num;

            while($row =mysqli_fetch_array($result)){
                $Id=$row['id'];
                $nums=$nums+1;
                echo $nums;
         ?>


        <?php 
       
         ?>

        <div class="row">
            <div class="col-md-4">
                <strong></strong>
            </div>
            <div class="col-md-4">
                <p>Name: <?php echo $row['firstname'].' '. $row['lasstname']; ?></p>
            </div>
            <div class="col-md-4 d-flex justify-content-around">
            <a href="update.php?id=<?php echo $row['id']; ?>" class= "btn btn-success">Edit</a>
           <button id="delete" class="btn btn-danger" onclick="mydelete(<?php echo $row['id'] ?>)" >Delete</button>
           <input type="hidden" id="id" value="<?php echo $row['id'] ?>">   
                <!-- <button type="button" class="btn btn-danger ">Delete</button> -->
            </div>
        </div>

        <!--row-->
        <hr>
        <div class="row">
            <div class="col-md-3">
                <img src="<?php echo $row['image'];?>" class="img-fluid rounded-top" alt="">
            </div>
            <div class="col-md-9" style="    overflow-y: scroll;height: 240px;">
                <div class="table-responsive">
                    <table class="table table-primary">
                        <tr>
                            <th>Email:
                            <th>
                            <td><?php echo $row['email'];?></td>
                        </tr>
                        <tr>
                            <th>Phone:
                            <th>
                            <td><?php echo $row['phone'];?></td>
                        </tr>
                        <tr>
                            <th>Designation:
                            <th>
                            <td><?php echo $row['designation'];?></td>
                        </tr>

                        <tr class="text-center">
                            <th>Qualification</th>
                        </tr>
                        <?php
        // select qualifications for this person
        $qual_query = "SELECT * FROM qualification WHERE id = '$Id'";
        $qual_result = mysqli_query($conn, $qual_query);
        $qual_num = mysqli_num_rows($qual_result);
        if ($qual_num > 0) {
            while ($qual_row = mysqli_fetch_array($qual_result)) {
?>
                        <tr>
                            <th>Class:</th>
                            <td><?php echo $qual_row['class'];?></td>
                        </tr>
                        <tr>
                            <th>Board:</th>
                            <td><?php echo $qual_row['board'];?></td>
                        </tr>
                        <tr>
                            <th>Percentage:</th>
                            <td><?php echo $qual_row['percentage'];?></td>
                        </tr>
                        <tr>
                            <th>City:</th>
                            <td><?php echo $qual_row['city'];?></td>
                        </tr>
                        <?php
            }
        }
?>

                    </table>
                </div>

            </div>
        </div>
        <?php }
} ?>
    </div><!-- main-page-->
    </div><!-- container-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
         

        
    </script>
    <script>
        
         
        let del =document.getElementById('delete');
       

        function mydelete(id){
          
            console.log(id)
           let choose= confirm("Are you sure you want to delete your data ?")
                if(choose){
                    window.location.href = "delete.php?id=" +id;
                }
             
        }
        </script>
</body>

</html>
