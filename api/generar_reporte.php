<?php
require_once('../modulos/fpdf/fpdf.php');
// Establecer la cabecera de respuesta como JSON
header('Content-Type: application/json');

// Verificar si se proporcionó la fecha en la solicitud GET
if (isset($_GET['fechaInicio']) && isset($_GET['fechaFin'])) {
    $fechainicio = $_GET['fechaInicio'];
    $fechafin = $_GET['fechaFin'];

    // Conectar a la base de datos
    $conn = new mysqli('192.168.1.101', 'apiroot3', 'root123', 'pruebahosp', 3306);

    // Verificar la conexión
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    // Consultar los registros de asistencia para la fecha proporcionada
    $sql = "SELECT * FROM listado_horarios WHERE DATE(timestamp) BETWEEN '$fechainicio' AND '$fechafin'";
    $result = $conn->query($sql);

    

    // Verificar si se encontraron registros
    if ($result->num_rows > 0) {
        $pdf = new FPDF();
        $pdf->AddPage();

        // Definir encabezados de columna
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(40, 10, 'Usuario', 1);
        $pdf->Cell(40, 10, 'Tipo de Entrada', 1);
        $pdf->Cell(40, 10, 'Timestamp', 1);
        $pdf->Ln();

        // Recorrer los resultados y agregarlos al PDF
        while ($row = $result->fetch_assoc()) {
            $pdf->Cell(40, 10, $row['usuario'], 1);
            $pdf->Cell(40, 10, $row['tipo_entrada'], 1);
            $pdf->Cell(40, 10, $row['timestamp'], 1);
            $pdf->Ln();
        }

        // Cerrar la conexión
        $conn->close();
        // Generar el contenido del PDF
        ob_start();
        $pdf->Output();
        $pdf_content = ob_get_clean();

        // Devolver el contenido del PDF
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="listado_horarios.pdf"');
        echo $pdf_content;
    } else {
        echo json_encode(array('message' => 'No se encontraron registros para la fecha proporcionada.'));
    }
  
} else {
    // Si no se proporciona la fecha, devolver un mensaje de error
    echo json_encode(array('message' => 'La fecha no fue proporcionada.'));
}
?>
