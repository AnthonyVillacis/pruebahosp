<?php
require_once('../api/conexion.php');
// Establecer la cabecera de respuesta como JSON
header('Content-Type: application/json');

// Verificar si se proporcionó la fecha en la solicitud GET
if (isset($_GET['fecha'])) {

    $fecha = $_GET['fecha'];

    $conn = conectarBaseDatos();
    // Consultar los registros de asistencia para la fecha proporcionada
    $sql = "SELECT * FROM listado_horarios WHERE DATE(timestamp) = '$fecha'";
    $result = $conn->query($sql);

    // Verificar si se encontraron registros
    if ($result->num_rows > 0) {
        // Array para almacenar los resultados
        $registros = array();

        // Recorrer los resultados y agregarlos al array
        while ($row = $result->fetch_assoc()) {
            $registros[] = $row;
        }

        // Devolver los resultados como JSON
        echo json_encode($registros);
    } else {
        echo json_encode(array('message' => 'No se encontraron registros para la fecha proporcionada.'));
    }

    // Cerrar la conexión
    $conn->close();
} else {
    // Si no se proporciona la fecha, devolver un mensaje de error
    echo json_encode(array('message' => 'La fecha no fue proporcionada.'));
}
?>
