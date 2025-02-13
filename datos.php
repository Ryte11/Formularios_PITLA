<?php
include("Form1.php"); // Archivo de conexión

// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir y limpiar los datos del formulario
    $nombre = trim($_POST["nombre"]);
    $apellido = trim($_POST["apellido"]);
    $segundo_apellido = trim($_POST["segundo_apellido"]);
    $id_acta_nacimiento = trim($_POST["id_acta_nacimiento"]);
    $escuela_anterior = trim($_POST["escuela_anterior"]);
    $direccion_actual = trim($_POST["direccion_actual"]);
    $sector = trim($_POST["sector"]);
    $localidad = trim($_POST["localidad"]);
    $fecha_nacimiento = $_POST["fecha_nacimiento"];

    // Validaciones básicas
    if (empty($nombre) || empty($apellido) || empty($id_acta_nacimiento) || empty($direccion_actual) || empty($fecha_nacimiento)) {
        die("Error: Todos los campos obligatorios deben estar llenos.");
    }

    // Validar que el ID de acta de nacimiento sea único
    $check_sql = "SELECT id FROM datos_estudiantes_1 WHERE id_acta_nacimiento = ?";
    $stmt = $conexion->prepare($check_sql);

    if (!$stmt) {
        die("Error en la preparación de la consulta: " . $conexion->error);
    }

    $stmt->bind_param("s", $id_acta_nacimiento);
    $stmt->execute();

    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        die("Error: El ID de acta de nacimiento ya está registrado.");
    }

    $stmt->close();

    // Insertar datos en la base de datos
    $sql = "INSERT INTO datos_estudiantes_1 (nombre, apellido, segundo_apellido, id_acta_nacimiento, escuela_anterior, direccion_actual, sector, localidad, fecha_nacimiento) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("sssssssss", $nombre, $apellido, $segundo_apellido, $id_acta_nacimiento, $escuela_anterior, $direccion_actual, $sector, $localidad, $fecha_nacimiento);

    if ($stmt->execute()) {
        echo "Registro exitoso.";
    } else {
        echo "Error al guardar los datos.";
    }

    // Cerrar la conexión
    $stmt->close();
    $conexion->close();
}