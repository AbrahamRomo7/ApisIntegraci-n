<?php
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Headers: Origin, X-Requested-with, Content-type, Authorization');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
$serverName = "localhost";
$dbName = "zcurso";
$userName = "root";
$password = "";
$conn = mysqli_connect($serverName, $userName, $password, $dbName);
$mysqli = new mysqli($serverName, $userName, $password, $dbName);
if(!$mysqli){
    die("Error: ".mysqli_connect_error());
}
?>