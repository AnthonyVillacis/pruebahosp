# Prueba Tecnica 


## Descripcion

el proyecto consiste en 4 archivos 

- index.php contine el main del programa
- registro.php contiene la funcionalidad de registro de personal por usuario y contraseña
- asistencias.php contiene el codigo listado de asistencias por dia
- reportes.php contiene el codigo para generar el pdf de los registros

## Tabla de contenidos

- [Instalacion](#instalacion)
- [Estructura](#estructura)

## instalacion

1 forma
usar Xampp con php 8.1+ colocar en la carpeta htdocs y luego probar la aplicacion

2 forma
a-con wsl instalar php 
b-luego instalar apache
c-instalar la extension php server en vscode 
d-correr el servidor php en la carpeta del proyecto

funcionamiento de la base de datos
para hacer funcionar la base de datos ir al archivo de conexion.php y grabar los valores 
de la base de datos, luego cargas las tablas con los registros de la carpeta sql y probar

## Estructura

--src
 |
 |_api (carpeta que contiene los controladores que se conectan con la base para leer o escribir)
 |
 |_css (carpeta que contiene los estilos)
 |
 |_js (carpeta que contiene los scripts)
 |
 |_modulos(carpeta que contiene modulos necesarios para generar reportes)
 |
 |_sql (carpeta que contiene los registros iniciales para la base de datos)
