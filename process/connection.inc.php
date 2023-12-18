<?php
// $username = "monu";
// $password = "Monu@123";
// $server = "localhost";
// $database = "consult";

$username = "root";
$password = "";
$server = "localhost";
$database = "unbundl";
$conn = mysqli_connect($server,$username,$password,$database);


if(!$conn){
    echo "connection unsuccessful";
     echo $conn->error;
}

?>