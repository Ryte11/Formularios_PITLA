<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario Estudiante2</title>
  <link rel="stylesheet" href="Form2.css">
</head>

<body>
  <div class="container">

    <h2>Datos personales del estudiante</h2>
    <form action="datos2.php" method="post" enctype="multipart/form-data">
      <div class="grid-container">
        <div class="field">
          <label for="lugarNacimiento">Lugar de nacimiento</label>
          <input id="lugarNacimiento" name="lugarNacimiento" type="text" placeholder="Lugar de nacimiento" required>
        </div>
        <div class="field">
          <label for="nacionalidad">Nacionalidad</label>
          <input id="nacionalidad" name="nacionalidad" type="text" placeholder="Nacionalidad" required>
        </div>
        <div class="field">
          <label for="correoElectronico">Correo electrónico</label>
          <input id="correoElectronico" name="correoElectronico" type="email" placeholder="Correo Electrónico" required>
        </div>
        <div class="field">
          <label for="gradoSolicita">Grado que Solicita</label>
          <select id="gradoSolicita" name="gradoSolicita" required>
            <option value="opcion1">Opción 1</option>
            <option value="opcion2">Opción 2</option>
            <option value="opcion3">Opción 3</option>
          </select>
        </div>
        <div class="field file-upload">
          <label for="actaNacimiento">Acta de nacimiento</label>
          <div>
            <input id="actaNacimiento" name="actaNacimiento" type="file" accept=".pdf, .jpg, .png">
          </div>
        </div>
        <div class="field file-upload">
          <label for="recordCalificaciones">Record de calificaciones</label>
          <div>
            <input id="recordCalificaciones" name="recordCalificaciones" type="file" accept=".pdf, .jpg, .png">
          </div>
        </div>
      </div>
      <button type="submit" class="submit-button">Siguiente</button>
    </form>
  </div>
  <script defer src="form2.js"></script>
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