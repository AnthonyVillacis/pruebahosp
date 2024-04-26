document.addEventListener('DOMContentLoaded', function() {
    const formListado = document.getElementById('formListado');
    const tablaListado = document.getElementById('tablaListado');

    formListado.addEventListener('submit', function(event) {
        event.preventDefault();
        const fecha = document.getElementById('fecha').value;

        fetch(`./api/generar_listado.php?fecha=${fecha}`)
        .then(response => response.json())
        .then(data => {
            console.log(data)
            // Renderizar los datos en una tabla
            let tablaHTML = '<table><thead><tr><th>Usuario</th><th>Tipo de entrada</th><th>Fecha de registro</th></tr></thead><tbody>';
            data.forEach(registro => {
                tablaHTML += `<tr><td>${registro.usuario}</td><td>${registro.tipo_entrada}</td><td>${registro.timestamp}</td></tr>`;
            });
            tablaHTML += '</tbody></table>';
            tablaListado.innerHTML = tablaHTML;
        })
        .catch(error => {
            console.error('Error al obtener los datos:', error);
            alert('Error no se tienen datos para mostrar seleccione otro dia.');
        });
    });
});
