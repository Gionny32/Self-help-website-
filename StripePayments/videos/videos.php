<?php
include ('db.php');

$sql = "SELECT * from video";
$res = mysqli_query($con,$sql);

echo "<h1>Myvideos</h1>";
while ($row = mysqli_fetch_assoc($res)){

       $id   = $row['id'];
       $name = $row['name'];

  echo "<h4><a href='watch.php?id=$id'> ".$name." </a></h4><br/>";
  // code...
}
