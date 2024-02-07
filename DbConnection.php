<?php

$databaseHost = 'localhost:3307';
$databaseName = 'seller1';
$databaseUsername = 'root';
$databasePassword = ''; 

$db_connection = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 
if(!$db_connection){
    echo 'DB_NOT_CONNECTED';
    }
?>
