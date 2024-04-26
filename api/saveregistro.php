<?php
$json_data = file_get_contents("php://input");

// Decodificar los datos JSON en un array asociativo
$data = json_decode($json_data, true);
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($data) ) {
    $username = $data['usuario'];
    $password = $data['password'];
    $tipoentrada = $data['entrada'];

    // Conectar a la base de datos
    $conn = new mysqli('192.168.1.101', 'apiroot3', 'root123', 'pruebahosp', 3306);
    // Verificar la conexión
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    // Buscar al usuario en la tabla de usuarios
    $sql = "SELECT id, password_md5 FROM usuarios WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Usuario encontrado, verificar la contraseña
        $row = $result->fetch_assoc();
        $stored_password = $row['password_md5'];
        if (md5($password) === $stored_password) {
            // Contraseña válida, insertar registro de asistencia
            $usuario_id = $row['id'];
            $sql = "INSERT INTO asistencias (usuario_id, tipo_entrada) VALUES ('$usuario_id', '$tipoentrada')";
            if ($conn->query($sql) === TRUE) {
                echo 'Registro guardado';
            } else {
                echo 'Error: ' . $sql . '<br>' . $conn->error;
            }
        } else {
            echo 'Contraseña incorrecta';
        }
    } else {
        echo 'Usuario no encontrado';
    }

    // Cerrar la conexión
    $conn->close();
}
?>
