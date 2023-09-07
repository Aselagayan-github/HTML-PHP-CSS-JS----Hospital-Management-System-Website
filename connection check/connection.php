<?php

$serverName = "localhost";
$userName ="root";
$password = "";
$dbName = "hospitald";

$con = mysqli_connect($serverName,$userName,$password,$dbName);

if(mysqli_connect_errno()){
    echo " failed to connect ";
    exit();
}
echo "Connection sucessful";

?>