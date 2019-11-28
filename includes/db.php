<?php



$host= "127.0.0.1";
$user= "root";
$pass="0022";
$database="F196083B";

$db= new mysqli($host,$user,$pass,$database);

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
} else {
    //echo "\nDatabase connected successfully";
}


?>
