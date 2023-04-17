<?php
include("config.php");

$status_id=$_POST["status_id"];
$id=$_POST["id"];


$query = "UPDATE `copy_project_details` SET `live_status`='$status_id' WHERE id='$id'";  

$result = mysqli_query($conn, $query);  

if($result=='1') {  echo $id; }

  
?>