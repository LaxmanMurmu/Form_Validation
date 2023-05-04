<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>
<body>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</html>

<?php 
include "quary.php";

$out =query("SELECT  basicdetail.name, basicdetail.mobile, basicdetail.email, basicdetail.image,designation.designation, qualification.board12, qualification.cgpa12, qualification.board10, qualification.cgpa10 ,qualification.degree,qualification.cgpa FROM basicdetail LEFT JOIN designation ON basicdetail.id= designation.id LEFT JOIN qualification ON basicdetail.id=qualification.id");

if(mysqli_num_rows($out)>0){?>
 <table class="table container my-5">
        <thead>
          <tr>
            <th scope="col">srno</th>
            <th scope="col">Photo</th>
            <th scope="col">Name</th>
            <th scope="col">Mobile</th>
            <th scope="col">email</th>
            <th scope="col">designation</th>
            <th scope="col">Board(12)</th>
            <th scope="col">CGPA(12)</th>
            <th scope="col">BOARD(10)</th>
            <th scope="col">CGPA(10)</th>
            <th scope="col">Degree</th>
            <th scope="col">CGPA</th>
          </tr>
        </thead>
        <tbody>
<?php
$srno =1;
  while($row =mysqli_fetch_array($out)){?>
    <tr>

    <th scope="row"><?php echo $srno ?></th>
    <td><img src="<?php echo $row['image']?>" class="img-fluid rounded-top" alt="" style="width:100px; height:100px;"></td>
    <td><?php echo $row['name'] ?></td> 
    <td><?php echo $row['mobile'] ?></td>
    <td><?php echo $row['email'] ?></td>
    <td><?php echo $row['designation'] ?></td>
    <td><?php echo $row['board12'] ?></td>
    <td><?php echo $row['cgpa12'] ?></td>
    <td><?php echo $row['board10'] ?></td>
    <td><?php echo $row['cgpa10'] ?></td>
    <td><?php echo $row['degree'] ?></td>
    <td><?php echo $row['cgpa'] ?></td>

  </tr>
  
  <?php $srno =$srno+1; } ?>
</tbody>
</table>

<?php }

?>

