<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario Estudiante</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" type="image/png" href="IMG/SUKA2.png">
  <link rel="stylesheet" href="css/Form_22.css">
</head>

<body>

  <!-- <div class="container">

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
  <script defer src="form2.js"></script> -->

  <div class="container1">
    <div class="form-cont">
      <div class="izquierda">
        <div class="cont_izquierda">
          <div class="tittle_form_cont">
            <h2 class="tittle_form">Datos personales de los Padres</h2>
          </div>

          <div class="circulos">
            <div class="num">1</div>
            <div class="line"></div>
            <div class="num">2</div>



          </div>
          <form action="datos2.php" method="post">
            <!-- first section -->
            <div class="first_section">
              <div>
                <label for="ocupacion">Ocupacion</label>
                <select id="ocupacion" name="ocupacion" required>
                  <option value="" disabled selected>Seleccione una Ocupacion</option>
                  <option value="publica">Publica</option>
                  <option value="privada">Privada</option>
                  <option value="otro">Otro</option>
                </select>
              </div>

              <div>
                <label for="telefono">Teléfono de contacto:</label>
                <input id="telefono" name="telefono" type="text" placeholder="Teléfono" required>
              </div>

              <div>
                <label for="correo_electronico">Correo electrónico:</label>
                <input id="correo_electronico" name="correo_electronico" type="text" placeholder="Correo electrónico"
                  required>
              </div>

              <button>Siguiente</button>
            </div>
            <!-- second section -->
            <div class="second_section">
              <div>
                <label for="nombre_padres">Nombre de los padres:</label>
                <input id="nombre_padres" name="nombre_padres" type="text" placeholder="Nombre de los padres:" required>
              </div>

              <div>
                <label for="tipo_familia">Tipo de familia:</label>
                <select id="tipo_familia" name="tipo_familia" required>
                  <option value="" disabled selected>Seleccione un Tipo de Familia</option>
                  <option value="biparental">Biparental</option>
                  <option value="monoparental">Monoparental</option>
                  <option value="otro">Otro</option>
                </select>
              </div>

              <div>
                <label for="direccion_actual">Dirección actual:</label>
                <input id="direccion_actual" name="direccion_actual" type="text" placeholder="Dirección actual"
                  required>
              </div>

              <button>Siguiente</button>
            </div>
            <!-- third section
            <div class="third_section">
              <div>
                <label for="sector">Sector</label>
                <input id="sector" name="sector" type="text" placeholder="Sector">
              </div>

              <div>
                <label for="localidad">Localidad</label>
                <select id="localidad" name="localidad" required>
                  <option value="" disabled selected>Seleccione una opción</option>
                  <option value="santo_domingo_este">Santo Domingo Este</option>
                  <option value="distrito_nacional">Distrito Nacional</option>
                  <option value="oeste">Oeste</option>
                  <option value="norte">Norte</option>
                </select>
              </div>

              <div>
                <div class="field">
                  <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                  <input id="fecha_nacimiento" name="fecha_nacimiento" type="date" required>
                </div>
              </div>

              <button>Siguiente</button>
            </div> -->

          </form>

          <!-- Contenedor para alertas -->
          <div id="alertContainer" class="position-fixed top-0 end-0 p-3" style="z-index: 11"></div>

        </div>
      </div>
      <div class="derecha">

      </div>
    </div>

  </div>
  <!-- Agregar Bootstrap JS y Popper.js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="js/js_form1.js"></script>

</body>

</html>