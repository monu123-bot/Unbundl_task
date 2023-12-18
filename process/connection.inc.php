<?php
// $username = "monu";
// $password = "Monu@123";
// $server = "localhost";
// $database = "consult";

$username = "epiz_30874962";
$password = "8RxeMsjLZen5D";
$server = "sql210.epizy.com";
$database = "epiz_30874962_consultancy";
$conn = mysqli_connect($server,$username,$password,$database);


if(!$conn){
    echo "connection unsuccessful";
     echo $conn->error;
}

?>