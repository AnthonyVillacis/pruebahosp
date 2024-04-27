<?php
function conectarBaseDatos() {
    // Datos de conexión a la base de datos
    $servername = 'localhost';
    $username = 'usuario';
    $password = 'contraseña';
    $database = 'basededatos';
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
