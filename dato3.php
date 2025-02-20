<?php
include("conexion.php"); // Aqui le hacemos referencia a Form3.php que es donde esta la conexion con la base de datos

// Aqui verificamos si el formulario se enviado. Con el metodo REQUEST_METHOD.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // aqui recibimos y le colocamos un nombre a los inputs atravez de los Name
    $ocupacion = trim($_POST["ocupacion"]);
    $telefono = trim($_POST["telefono"]);
    $correoElectronico = trim($_POST["correoElectronico"]);
    $nombrePadres = trim($_POST["nombrePadres"]);
    $tipoFamilia = trim($_POST["tipoFamilia"]);
    $direccionActual = trim($_POST["direccionActual"]);

    // Aqui validamos que cada uno de los campos esten correctamente llenos.
    if (empty($ocupacion) || empty($telefono) || empty($correoElectronico) || empty($nombrePadres) || empty($tipoFamilia) || empty($direccionActual)) {
        die("Error: Todos los campos deben ser completados.");
    }

    // Aqui se verifica que el correo electrónico no esté duplicado, y de ser asi no se enviara el formulario.
    $check_sql = "SELECT id FROM datos_padres WHERE correo_electronico = ?"; 
    $stmt = $conexion->prepare($check_sql);
    
    $stmt->bind_param("s", $correoElectronico);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        die("Error: Este correo ya está registrado.");
    }

    $stmt->close();

    // Aqui preparamos la consulta desde la base de datos para insertar los datos que el usuario escribio.
    $sql = "INSERT INTO datos_padres (ocupacion, telefono, correo_electronico, nombre_padres, tipo_familia, direccion_actual) 
            VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $conexion->prepare($sql);

    if (!$stmt) {
        die("Error en la preparación de la consulta (inserción de datos): " . $conexion->error);
    }

    $stmt->bind_param("ssssss", $ocupacion, $telefono, $correoElectronico, $nombrePadres, $tipoFamilia, $direccionActual);

    if ($stmt->execute()) {
        echo "Registro exitoso.";
    } else {
        echo "Error al guardar los datos: " . $stmt->error;
    }


    $stmt->close();
    $conexion->close();
}
?>

