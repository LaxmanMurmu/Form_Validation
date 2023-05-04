
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    

    <!-- fetch data -->
    <table class="table">
  <thead>
    <tr>
        <th>Id</th>
        <th>First NAme</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Phone Number</th>
        <th>Image</th>
        <th>Designation</th>

        <th>Qualification Id</th>
        <th>class</th>
        <th>board</th>
        <th>percentage</th>
        <th>city</th>
    </tr>
  </thead>
  <tbody>
  
  <?php
  include 'db_connect.php';
//   $sql="SELECT details.id, details.first_name, details.last_name, details.email, details.phone, details.image, details.designation, qualification.id, qualification.class, qualification.board, qualification.percentage, qualification.city FROM details LEFT JOIN qualification ON details.id=qualification.id";
  
  $sql="SELECT details.id, details.first_name, details.last_name, details.email, details.phone, details.image, details.designation, qualification.id, qualification.class, qualification.board, qualification.percentage, qualification.city 
  FROM details 
  LEFT JOIN qualification 
  ON details.id=qualification.id 
  GROUP BY details.id
  ";
//   $sql="SELECT details.id, details.first_name, details.last_name, details.email, details.phone, details.image, details.designation, qualification.id, qualification.class, qualification.board, qualification.percentage, qualification.city FROM details GROUP BY details.id LEFT JOIN  qualification ON details.id=qualification.id";
// $sql="SELECT 
//     details.id, 
//     MIN(details.first_name) AS first_name, 
//     MIN(details.last_name) AS last_name, 
//     MIN(details.email) AS email, 
//     MIN(details.phone) AS phone, 
//     MIN(details.image) AS image, 
//     MIN(details.designation) AS designation, 
//     MIN(qualification.id) AS qualification_id, 

//     MAX(qualification.class) AS class, 
//     MAX(qualification.board) AS board, 
//     MAX(qualification.percentage) AS percentage, 
//     MAX(qualification.city) AS city 
// FROM 
//     details 
// LEFT JOIN 
//     qualification 
// ON 
//     details.id=qualification.id 
// GROUP BY 
//     details.id;
// ";

//   $sql = "SELECT * FROM `product_data`";

 // Fetch ID value from `details` table
$query = "SELECT id FROM details ORDER BY id ASC LIMIT 1";
$result = mysqli_query($conn, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $id = $row['id'];
} else {
    $id = 0;
}

$result = mysqli_query($conn, $sql);
$executed_once = false; // set flag to false

while ($row = mysqli_fetch_array($result)) {

    if ($id == $id && !$executed_once) { // check flag before executing loop
        // Execute the code inside the do-while loop once
        do {
            echo "
            <tr>
                <td> $row[id]</td>
                <td> $row[first_name]</td>
                <td> $row[last_name]</td>
                <td> $row[email]</td>
                <td> $row[phone]</td>
                <td><img src='$row[image]' width='100px' height='100px' ></td>
                <td> $row[designation]</td>
            </tr>
            ";
            // $id=$id+1;
        } while (false); // Set the condition to false to execute the loop only once

        $executed_once = true; // unset the flag after the first iteration

    }
    

    // Execute the code outside the do-while loop for all iterations
    echo "
    <tr>
        <td> $row[id]</td>
        <td> $row[class]</td>
        <td> $row[board]</td> 
        <td> $row[percentage]</td>
        <td> $row[city]</td>
        <td> 
            <a href='delete.php? id= $row[id]' class='btn btn-danger'>Delete</a>
            <a href='cloneform.php? id= $row[id]' class='btn btn-success'>Update</a>
        </td>
    </tr>
    ";

}

  ?>

  </tbody>
</table>



</body>
</html>