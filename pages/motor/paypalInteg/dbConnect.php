<?php  
 $servername = "localhost";
 $username = "root";
 $password = "";
 $database = "motorshop";
// Connect with the database  
$db = new mysqli($servername, $username, $password, $database);  
  
// Display error if failed to connect  
if ($db->connect_errno) {  
    printf("Connect failed: %s\n", $db->connect_error);  
    exit();  
} 
 
?>