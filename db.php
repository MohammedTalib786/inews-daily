<?php

// ONLINE



// LOCAL
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "inews-app";
$port = 4306;

$con = mysqli_connect($db_server, $db_user, $db_pass, $db_name, $port);

if(!$con){
    echo "NOT Connected!";
}

?>