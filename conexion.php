<?php
$servidor = "localhost"; // Cambia si la base de datos está en otro servidor
$usuario = "root"; // Tu usuario de MySQL
$contrasena = ""; // Tu contraseña de MySQL (déjala vacía si no tienes)
$base_datos = "RegistroEstudiantes"; // Nombre de tu base de datos

// Crear conexión
$conexion = new mysqli($servidor, $usuario, $contrasena, $base_datos);

// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
} else {

}
?>