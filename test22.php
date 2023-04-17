<?php
include("config.php");
include('mobile_detect.php');

$i=0;
$project = mysqli_query($conn,"select * from project_details where report_name='EVEREST ASSOCIATES' and delete_status=0");   
while($project1 = mysqli_fetch_array($project))
{$i++;

$id=$project1['id'];

$file_no="EA".$i;
	
$query = "UPDATE `project_details` SET `file_no`='$file_no' where id='$id'";
$inserted = mysqli_query($conn, $query);	
	
}



?>