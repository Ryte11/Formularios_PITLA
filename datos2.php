<?php
// Archivo: datos2.php - Procesa el segundo formulario
session_start();
include("../config.php");
include("conexion.php");

// Conectar a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$database = "RegistroEstudiantes";

$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar que existe un ID de estudiante en la sesión
    if (!isset($_SESSION['estudiante_id'])) {
        die("Error: No se encontró información del estudiante. Por favor complete el primer formulario.");
    }

    $estudiante_id = $_SESSION['estudiante_id'];

    // Recoger los datos del formulario de padres
    $ocupacion_padres = trim($_POST["ocupacion"]);
    $telefono_padres = trim($_POST["telefono"]);
    $correo_padres = trim($_POST["correo_electronico_padres"]);
    $nombre_padres = trim($_POST["nombre_padres"]);
    $tipo_familia = isset($_POST["tipo_familia"]) ? trim($_POST["tipo_familia"]) : "";
    $direccion_padres = trim($_POST["direccion_actual"]);

    // ACTUALIZAR el registro existente con los datos de los padres
    $stmt = $conn->prepare("UPDATE datos_estudiantes SET 
        ocupacion_padres = ?, 
        telefono_padres = ?, 
        correo_padres = ?, 
        nombre_padres = ?, 
        tipo_familia = ?, 
        direccion_padres = ? 
        WHERE id = ?");

    if (!$stmt) {
        die("Error en la preparación de la consulta: " . $conn->error);
    }

    $stmt->bind_param(
        "ssssssi",
        $ocupacion_padres,
        $telefono_padres,
        $correo_padres,
        $nombre_padres,
        $tipo_familia,
        $direccion_padres,
        $estudiante_id
    );

    if ($stmt->execute()) {
        // Limpiar la sesión
        unset($_SESSION['estudiante_id']);

        echo "✅ Registro completado correctamente. Se han guardado todos los datos.";
        header("Location: Form1.php");
        exit();
    } else {
        echo "Error al guardar los datos de los padres: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>