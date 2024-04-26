<?php
  $data = 'Hello World';
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Prueba Tecnica-registro</title>
    <link rel="stylesheet" href="./css/global.css">
    <link rel="stylesheet" href="./css/registro.css">
  </head>
  <body>
    <header>
      <nav class="nav-container">
        <ul>
          <li><a href="index.php">inicio</a></li>
          <li><a href="asistencias.php">Listado de asistencias</a></li>
          <li><a href="reportes.php">Generar Reportes</a></li>
        </ul>
      </nav>
    </header>
    <main>
        <form method="post" id="registro">
          <label for="user">Usuario:</label>
          <input type="text" id="user" name="user" required>
          <label for="password">contraseña:</label>
          <input type="password" id="password" name="password" required>
          <label for="tipoentrada">Tipo de entrada:</label>
          <select id="tipoentrada" name="tipoentrada" required>
            <option value="seleccion" disabled selected>Selecciona una entrada</option>
            <option value="entrada">Entrada</option>
            <option value="salida">Salida</option>
          </select>
          <button type="submit">Registrar</button>
        </form>
    </main>
    <script src="./js/registro.js"></script>
  </body>
</html>