$id= $mysqli->insert_id;
$sqldelete = "DELETE * From `qualification` where `id`='$id';
 $resdel=mysqli_query($conn, $sqldelete);
foreach($Class as $index => $cl){
 $c_board = $Board[$index];
 $c_percentage = $Percentage[$index];
 $c_city = $City[$index];
$sqle ="INSERT INTO `qualification`(`id`, `class`, `board`, `percentage`, `city`) VALUES ('$id','$cl','$c_board','$c_percentage','$c_city')";

$res=mysqli_query($conn, $sqle);