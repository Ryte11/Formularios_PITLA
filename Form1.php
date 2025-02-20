<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario Estudiante</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" type="image/png" href="IMG/SUKA2.png">
  <link rel="stylesheet" href="css/Form_11.css">
</head>

<body>

  <div class="container1">
    <div class="form-cont">
      <div class="izquierda">
        <div class="cont_izquierda">
          <div class="tittle_form_cont">
            <h2 class="tittle_form">Datos personales del estudiante</h2>
          </div>

          <div class="circulos">
            <div class="num">1</div>
            <div class="line"></div>
            <div class="num">2</div>
            <div class="line" style=></div>
            <div class="num">3</div>
            <div class="line" style=></div>
            <div class="num">4</div>

          </div>
          <form action="datos.php" method="post" enctype="multipart/form-data" id="form">
            <!-- first section -->
            <div class="first_section">
              <div>
                <label for="nombre">Nombre del estudiante:</label>
                <input id="nombre" name="nombre" type="text" placeholder="Nombre" required>
              </div>

              <div>
                <label for="apellido">Primer apellido del estudiante:</label>
                <input id="apellido" name="apellido" type="text" placeholder="Apellido" required>
              </div>

              <div>
                <label for="segundo_apellido">Segundo apellido del estudiante:</label>
                <input id="segundo_apellido" name="segundo_apellido" type="text" placeholder="Segundo apellido"
                  required>
              </div>

              <button>Siguiente</button>
            </div>

            <!-- second sectionn -->
            <div class="second_section">
              <div class="acta">
                <label for="id_acta_nacimiento">ID de acta de nacimiento:</label>

                <div class="Adjuntar_acta">
                  <input id="id_acta_nacimiento" name="id_acta_nacimiento" type="text"
                    placeholder="ID de acta de nacimiento" required>

                  <label for="Acta_de_nacimiento" class="label_acta">
                    Adjuntar Acta de nacimiento
                    <input type="file" id="Acta_de_nacimiento" name="acta_nacimiento" class="acta_input" accept=".pdf" required>
                  </label>
                </div>
              </div>

              <div>
                <label for="RecordDeNotas">Record de notas:</label>
                <label class="label_Notas">
                  Adjuntar record de notas
                  <input type="file" id="record_notas" name="record_notas" class="Notas_input" accept=".pdf" required>
                </label>
              </div>

              <div>
                <label for="escuela_anterior">Escuela Anterior</label>
                <input id="escuela_anterior" name="escuela_anterior" type="text" placeholder="Escuela anterior"
                  required>
              </div>

              <div>
                <label for="direccion_actual">Dirección Actual</label>
                <input id="direccion_actual" name="direccion_actual" type="text" placeholder="Dirección actual"
                  required>
              </div>

              <button>Siguiente</button>
            </div>
            <!-- third section -->
            <div class="third_section">
              <div>
                <label for="sector">Sector</label>
                <input id="sector" name="sector" type="text" placeholder="Sector" required>
              </div>

              <div>
                <label for="localidad">Localidad</label>
                <select id="localidad" name="localidad" required>
                  <option value="" disabled selected>Seleccione una opción</option>
                  <option value="Santo Domingo Este">Santo Domingo Este</option>
                  <option value="Distrito Nacional">Distrito Nacional</option>
                  <option value="Oeste">Santo Domingo Oeste</option>
                  <option value="Norte">Santo Domingo Norte</option>
                </select>
              </div>

              <div>
                <div class="field">
                  <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                  <input id="fecha_nacimiento" name="fecha_nacimiento" type="date" required>
                </div>
              </div>

              <button>Siguiente</button>
            </div>

            <!-- Fourth section -->
            <div class="fourth_section">

              <div>
                <label for="lugar_nacimiento">Lugar de Nacimiento</label>
                <input id="lugar_nacimiento" name="lugar_nacimiento" type="text" placeholder="Lugar de Nacimiento"
                  required>
              </div>

              <div>
                <label for="nacionalidad">Nacionalidad</label>
                <input id="nacionalidad" name="nacionalidad" type="text" placeholder="Nacionalidad" required>
              </div>

              <div>
                <label for="correo_electronico">Correo Electronico</label>
                <input id="correo_electronico" name="correo_electronico" type="email" placeholder="Correo Electrónico"
                  required pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$">
              </div>

              <div>
                <label for="grado_solicitado">Grado Solicitado</label>
                <select id="grado_solicitado" name="grado_solicitado" required>
                  <option value="" disabled selected>Seleccione un Grado</option>
                  <option value="Primero">Primero (Antiguo Septimo)</option>
                  <option value="Segundo">Segundo (Antiguo Octavo)</option>
                  <option value="Tercero">Tercero (Antiguo Primero de Bachiller)</option>
                </select>
              </div>

              <button>Enviar</button>
            </div>


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
  <script src="../Parte_Usuario\js\js_Form_oficial.js"></script>
  
</body>

</html>