<?php
$server = "localhost:3308";
$username = "root";
$password = "firstStart2002";
$database = "story";

$conn = mysqli_connect($server, $username, $password, $database);
if (!$conn){
//     echo "success";
// }
// else{
    die("Error". mysqli_connect_error());
}

?>