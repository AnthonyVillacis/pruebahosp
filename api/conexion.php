<?php
function conectarBaseDatos() {
    // Datos de conexión a la base de datos
    $servername = '192.168.1.101';
    $username = 'apiroot3';
    $password = 'root123';
    $database = 'pruebahosp';
    $port = 3306;

    // Crear la conexión
    $conn = new mysqli($servername, $username, $password, $database, $port);

    // Verificar la conexión
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    return $conn;
}
?>
