<?php
// Encabezados para permitir el manejo de aplicaciones JSON
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-with, Content-type, Authorization');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');

include 'conexion.php';

// Obtener los datos enviados a través de GET
$id = $_GET['id'];
$title = $_GET['title'];
$description = $_GET['description'];
$status = $_GET['status']; 
if (!isset($id)) {
    echo json_encode("Error: El ID de la tarea es obligatorio.");
    exit;
}
$sqlUpdate = "UPDATE tasks SET title = '$title', description = '$description', status = '$status' WHERE id = $id";

if ($mysqli->query($sqlUpdate) === TRUE) {
    echo json_encode("La tarea se actualizó correctamente");
} else {
    echo json_encode("Error: " . $sqlUpdate . " - " . $mysqli->error);
}

$mysqli->close();
?>
