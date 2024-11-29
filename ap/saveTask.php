<?php
//Encabezados para dar permisos de manejo de aplicaciones json
//Para funcionamiento
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Headers: Origin, X-Requested-with, Content-type, Authorization');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
include 'conexion.php';
$title = $_GET['title'];
$description = $_GET['description'];
$sqlInsert = "INSERT INTO tasks(title, description, status) VALUES('$title','$description','pendiente')";
if($mysqli->query($sqlInsert)===TRUE){ //tres iguales debe ser exactamente igual
    echo json_encode("Se guardo correctamente");
} else {
    echo json_encode("Error: ".$sqlInsert.$mysqli->error);
}
$mysqli->close();
?>