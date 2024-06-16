<?php

// ONLINE
// data transferred to another file for security concerns (onldetign)

// LOCAL
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "inews-app";
// $port = 4306;

// $con = mysqli_connect($db_server, $db_user, $db_pass, $db_name, $port);
$con = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

if(!$con){
    echo "NOT Connected!";
}

?>