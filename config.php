<?php

error_reporting(0);

define("DB_HOST", "localhost");
define("DB_USER", "kkpzpdrfvp");
define("DB_PASSWORD", "yQAnrue5C3");
define("DB_NAME", "kkpzpdrfvp");
session_start();	
ini_set('session.gc_maxlifetime', 36000);

// each client should remember their session id for EXACTLY 1 hour
session_set_cookie_params(36000);

date_default_timezone_set('Asia/Calcutta'); 
$date_time=date("Y-m-d H:i:s");
$date_time_micro=strtotime($date_time);
	
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

$GLOBALS['connect']=$conn;


$web_url="https://www.arrulassociates.com/test/";


function select_value_other($table_name,$field_name,$id_value)
{
$bind = mysqli_query($GLOBALS['connect'],"SELECT * FROM $table_name where id='$id_value'"); 
$bind1=mysqli_fetch_array($bind);
$title=ucwords(strtolower($bind1[$field_name]));
return $title;
}








    ?>