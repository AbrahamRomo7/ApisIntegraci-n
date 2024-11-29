<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-with, Content-type, Authorization');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');

include 'conexion.php';

// Verificar si se ha pasado un ID a través de GET
$id = isset($_GET['id']) ? intval($_GET['id']) : null;

// Construir la consulta SQL según si se pasa un ID o no
if ($id) {
    $sqlSelect = "SELECT * FROM tasks WHERE id = ?";
    $stmt = $conn->prepare($sqlSelect);
    $stmt->bind_param("i", $id);
} else {
    $sqlSelect = "SELECT * FROM tasks";
    $stmt = $conn->prepare($sqlSelect);
}

$stmt->execute();
$resultado = $stmt->get_result();
$result = array();

if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        array_push($result, $fila);
    }
} else {
    $result = "No hay tareas";
}
echo json_encode($result);
$stmt->close();
$conn->close();
?>
