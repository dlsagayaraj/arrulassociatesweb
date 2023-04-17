<?php   
session_destroy(); //destroy the session
header("location:/document/index"); //to redirect back to "index.php" after logging out
exit();
?>