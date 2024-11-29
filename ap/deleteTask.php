<?php
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Headers: Origin, X-Requested-with, Content-type, Authorization');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');

include 'conexion.php';

// Obtener el ID de la tarea a eliminar
$id = $_GET["id"];

// Consulta SQL para eliminar la tarea
$sqlDelete = "DELETE FROM tasks WHERE id = '$id'";

// Ejecutar la consulta y manejar la respuesta
if ($mysqli->query($sqlDelete) === TRUE) {
    echo json_encode("La tarea se eliminó correctamente");
} else {
    echo json_encode("Error: No se pudo eliminar la tarea. " . $mysqli->error);
}

// Cerrar conexión
$mysqli->close();
?>
