document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");

    form.addEventListener("submit", function (event) {
        event.preventDefault(); // Evita el envío del formulario si hay errores
        let valid = true;

        // Limpiar mensajes de error previos
        document.querySelectorAll(".error-message").forEach(el => el.remove());

        // Función para mostrar errores
        function showError(input, message) {
            let error = document.createElement("div");
            error.className = "error-message";
            error.style.color = "red";
            error.style.fontSize = "12px";
            error.textContent = message;
            input.parentNode.appendChild(error);
        }

        // Validación de cada campo
        const fields = [
            { id: "lugarNacimiento", message: "Este campo es obligatorio" },
            { id: "nacionalidad", message: "Este campo es obligatorio" },
            { id: "correoElectronico", message: "Ingresa un correo válido", type: "email" },
            { id: "gradoSolicita", message: "Debes seleccionar un grado" },
            { id: "actaNacimiento", message: "Adjunta el acta de nacimiento", type: "file" },
            { id: "recordCalificaciones", message: "Adjunta el récord de calificaciones", type: "file" }
        ];

        fields.forEach(field => {
            const input = document.getElementById(field.id);

            if (!input) return;

            // Verifica si está vacío
            if (!input.value.trim()) {
                showError(input, field.message);
                valid = false;
            }

            // Validar email
            if (field.type === "email" && input.value.trim()) {
                const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailPattern.test(input.value)) {
                    showError(input, "Correo electrónico no válido");
                    valid = false;
                }
            }

            // Validar archivos
            if (field.type === "file") {
                if (!input.files || input.files.length === 0) {
                    showError(input, field.message);
                    valid = false;
                }
            }
        });

        if (valid) {
            form.submit(); // Enviar formulario si todo es válido
        }
    });
});
document.getElementById("miFormulario").addEventListener("submit", function(event) {
    event.preventDefault(); // Evita que el formulario se envíe
    
    let input = document.getElementById("respuesta");
    let errorMensaje = document.getElementById("errorMensaje");

    if (input.value.trim() === "") {
        input.classList.add("error"); // Pone el borde en rojo
        errorMensaje.style.display = "block"; // Muestra el mensaje
    } else {
        input.classList.remove("error");
        errorMensaje.style.display = "none";
        alert("Formulario enviado correctamente"); // Aquí puedes hacer el envío real
    }
});
