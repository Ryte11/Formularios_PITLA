<?php
include("Form2.php"); // Archivo de conexión

// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir y limpiar los datos del formulario
    $lugar_nacimiento = trim($_POST["lugarNacimiento"]);
    $nacionalidad = trim($_POST["nacionalidad"]);
    $correo_electronico = trim($_POST["correoElectronico"]);
    $grado_solicitado = trim($_POST["gradoSolicita"]);

    // Validaciones básicas
    if (empty($lugar_nacimiento) || empty($nacionalidad) || empty($correo_electronico) || empty($grado_solicitado)) {
        die("Error: Todos los campos obligatorios deben estar llenos.");
    }

    // Validar que el correo electrónico sea único
    $check_sql = "SELECT id FROM Datos_Estudiantes_2 WHERE correo_electronico = ?";
    $stmt = $conexion->prepare($check_sql);

    if (!$stmt) {
        die("Error en la preparación de la consulta: " . $conexion->error);
    }

    $stmt->bind_param("s", $correo_electronico);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        die("Error: El correo electrónico ya está registrado.");
    }

    $stmt->close();

    // Manejo de archivos (Acta de nacimiento y récord de calificaciones)
    $upload_dir = "uploads/";
    if (!file_exists($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    $acta_nacimiento_path = "";
    $record_calificaciones_path = "";

    if (!empty($_FILES["actaNacimiento"]["name"])) {
        $acta_nacimiento_path = $upload_dir . basename($_FILES["actaNacimiento"]["name"]);
        move_uploaded_file($_FILES["actaNacimiento"]["tmp_name"], $acta_nacimiento_path);
    }

    if (!empty($_FILES["recordCalificaciones"]["name"])) {
        $record_calificaciones_path = $upload_dir . basename($_FILES["recordCalificaciones"]["name"]);
        move_uploaded_file($_FILES["recordCalificaciones"]["tmp_name"], $record_calificaciones_path);
    }

    // Insertar datos en la base de datos
    $sql = "INSERT INTO datos_estudiantes_2 (lugar_nacimiento, nacionalidad, correo_electronico, grado_solicitado) 
            VALUES (?, ?, ?, ?)";

    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ssss", $lugar_nacimiento, $nacionalidad, $correo_electronico, $grado_solicitado);

    if ($stmt->execute()) {
        echo "Registro exitoso.";
    } else {
        echo "Error al guardar los datos.";
    }

    // Cerrar la conexión
    $stmt->close();
    $conexion->close();
}
