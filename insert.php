<?php
include("config.php");

$status_key=explode("-",$_POST["status_id"]);
$table=$_POST["table"];
if($status_key[0]!='' && $status_key[1]=='333')  
 {  
$status_id=$status_key[0];

if ($_POST["status"]=='Active') { $code='0';} if ($_POST["status"]=='Pending') {  $code='1';}

       $query = "UPDATE `$table` SET `delete_status`='1' WHERE id='$status_id'";  
	  
	  
      $result = mysqli_query($conn, $query);  
	  
	  if($result=='1') {  echo $status_id.'-444'; }

 }  
?>