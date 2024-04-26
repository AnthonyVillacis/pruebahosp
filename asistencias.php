<?php
  $data = 'Hello World';
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Prueba Tecnica</title>
    <link rel="stylesheet" href="./css/global.css">
    <link rel="stylesheet" href="./css/index.css">
  </head>
  <body>
    <header>
      <nav class="nav-container">
        <ul>
          <li><a href="registro.php">Registro de entrada y salida</a></li>
          <li><a href="index.php">inicio</a></li>
          <li><a href="reportes.php">Generar Reportes</a></li>
        </ul>
      </nav>
    </header>
    <main>
      <form id="formListado">
          <label for="fecha">Fecha:</label>
          <input type="date" id="fecha" name="fecha" value="<?php echo date('Y-m-d'); ?>">
          <button type="submit">Generar Listado</button>
      </form>
      <div id="tablaListado"></div>
    </main>
    <script src="./js/asistencias.js"></script>
  </body>
</html>