<?php
include ('db.php');

if(isset($_GET['id'])){
$id = $_GET['id'];

$sql ="select name from video where id='$id'";
$res = mysqli_query($con,$sql);

$row = mysqli_fetch_assoc($res);
$name = $row['name'];

echo "<h1>You are watching:".$name."</h1>";

$myURL = "http://localhost/websiteparissa/StripePayments/videos/upload".$name;



?>




<!DOCTYPE html>
<html>
<body>

  <object width="425" height="350" data="http://localhost/websiteparissa/StripePayments/videos/upload"
  type="application/Elmidia Video Player"> <param name="$myURL" value="videos/upload" /></object>



 </body>
</html>
<?php
}




?>
