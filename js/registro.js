document.addEventListener('DOMContentLoaded', function() {
  document.getElementById('registro').addEventListener('submit', function(evento) {
    evento.preventDefault(); // Evitar el envío por defecto del formulario
    let usuario = document.getElementById('user').value;
    let password = document.getElementById('password').value;
    let entrada = document.getElementById('tipoentrada').value;
    
    if (usuario === '' || password === '' || entrada === '') {
      alert('Por favor, rellene todos los campos');
    }
    else {
      let datos = {
        usuario: usuario,
        password: password,
        entrada: entrada
      };
      fetch('./api/saveregistro.php', {
        method: 'POST',
        body: JSON.stringify(datos),
        headers: {
          'Content-Type': 'application/json'
        }
      })
      .then(function(response) {
        if(response.ok) {
          return response.text();
        }
        else {
          throw 'Error en la llamada a Ajax';
        }
      })
      .then(function(texto) {
        if (texto === 'Registro guardado') {
          alert('Registro correcto');
          window.location.href = 'index.php';
        }
        else {
          alert('Error en el registro de asistencia: ' + texto);
        }
      })
      .catch(function(error) {
        alert('Error en la llamada Ajax: ' + error);
      });
    }
  });
});