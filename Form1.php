<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario Estudiante</title>
  <link rel="stylesheet" href="Form1.css">
</head>
<body>
<div class="container">
    <h2>Datos personales del estudiante</h2>
    <form action="datos.php" method="post">
      <div class="grid-container">
        <div class="field">
          <label for="nombre">Nombre</label>
          <input id="nombre" name="nombre" type="text" placeholder="Nombre" required>
        </div>
        <div class="field">
          <label for="apellido">Apellido</label>
          <input id="apellido" name="apellido" type="text" placeholder="Apellido" required>
        </div>
        <div class="field">
          <label for="segundo_apellido">Segundo Apellido</label>
          <input id="segundo_apellido" name="segundo_apellido" type="text" placeholder="Segundo apellido">
        </div>
        <div class="field">
          <label for="id_acta_nacimiento">ID de acta de nacimiento</label>
          <input id="id_acta_nacimiento" name="id_acta_nacimiento" type="text" placeholder="ID de acta de nacimiento" required>
        </div>
        <div class="field">
          <label for="escuela_anterior">Escuela Anterior</label>
          <input id="escuela_anterior" name="escuela_anterior" type="text" placeholder="Escuela anterior">
        </div>
        <div class="field">
          <label for="direccion_actual">Dirección Actual</label>
          <input id="direccion_actual" name="direccion_actual" type="text" placeholder="Dirección actual" required>
        </div>
        <div class="field">
          <label for="sector">Sector</label>
          <input id="sector" name="sector" type="text" placeholder="Sector">
        </div>
        <div class="field">
          <label for="localidad">Localidad</label>
          <select id="localidad" name="localidad" required>
            <option value="Opción 1">Opción 1</option>
            <option value="Opción 2">Opción 2</option>
            <option value="Opción 3">Opción 3</option>
          </select>
        </div>
        <div class="field">
          <label for="fecha_nacimiento">Fecha de Nacimiento</label>
          <input id="fecha_nacimiento" name="fecha_nacimiento" type="date" required>
        </div>
      </div>
      <button type="submit" class="submit-button">Siguiente</button>
    </form>
</div>

</body>
</html>

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



