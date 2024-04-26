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
          <li><a href="asistencias.php">Listado de asistencias</a></li>
          <li><a href="index.php">inicio</a></li>
        </ul>
      </nav>
    </header>
    <main>
      <form id="formListado">
        <label for="fecha">Fecha Inicio:</label>
        <input type="date" id="fecha" name="fecha" value="<?php echo date('Y-m-d'); ?>">
        <label for="fecha2">Fecha Fin:</label>
        <?php
            // Calcular la fecha actual y sumarle 7 días
            $fecha_fin = date('Y-m-d', strtotime('+7 days'));
        ?>
        <input type="date" id="fecha2" name="fecha2" value="<?php echo $fecha_fin; ?>">
        <button type="submit">Generar Reporte</button>
      </form>
    </main>
    <script src="./js/reportes.js"></script>
  </body>
</html>