document.addEventListener('DOMContentLoaded', function() {
  const formListado = document.getElementById('formListado');

  formListado.addEventListener('submit', function(event) {
      event.preventDefault();

      // Obtener las fechas de inicio y fin del formulario
      const fechaInicio = formListado.querySelector('#fecha').value;
      const fechaFin = formListado.querySelector('#fecha2').value;

      // Realizar una solicitud GET al servidor para obtener el PDF
      fetch(`./api/generar_reporte.php?fechaInicio=${fechaInicio}&fechaFin=${fechaFin}`)
          .then(response => response.blob())
          .then(blob => {
              // Crear un objeto URL para el blob
              const url = window.URL.createObjectURL(blob);

              // Crear un enlace <a> para descargar el PDF
              const a = document.createElement('a');
              a.href = url;
              a.download = 'listado_horarios.pdf';

              // Agregar el enlace al documento y hacer clic para iniciar la descarga
              document.body.appendChild(a);
              a.click();

              // Liberar el objeto URL
              window.URL.revokeObjectURL(url);
          })
          .catch(error => {
              console.error('Error al obtener el PDF:', error);
          });
  });

});
