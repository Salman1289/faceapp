<?php
$servername = "localhost";
$username = "appface";
$password = "Gh#3sG29S";
$dbname = "faceapp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// $servername = "localhost";
// $username = "minddb";
// $password = "BgF@75#Kg";
// $dbname = "minddb";

// // Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);
// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }else{
// 	echo "connected successfully";
// }


?>