// Add this CSS to complement your existing styles
const styles = `
.section {
  opacity: 0;
  display: none;
  transform: translateX(20px);
  transition: opacity 0.5s ease, transform 0.5s ease;
}

.section.active {
  opacity: 1;
  display: flex;
  transform: translateX(0);
}

/* Transition for the circles and lines */
.num {
  transition: background-color 0.3s ease;
}

.line {
  transition: background-color 0.3s ease;
}

.num.active {
  background-color: var(--principal-color);
}

.line.active {
  background-color: var(--principal-color);
}
`;

// Add the styles to the document
const styleSheet = document.createElement("style");
styleSheet.textContent = styles;
document.head.appendChild(styleSheet);

// JavaScript for handling section navigation
document.addEventListener('DOMContentLoaded', function() {
  const sections = [
    document.querySelector('.first_section'),
    document.querySelector('.second_section'),
    document.querySelector('.third_section'),
    document.querySelector('.fourth_section'),
  ];
  
  const numbers = document.querySelectorAll('.circulos .num');
  const lines = document.querySelectorAll('.circulos .line');
  let currentSection = 0;
  
  // Initialize first section and styles
  sections[0].classList.add('section', 'active');
  sections[1].classList.add('section');
  sections[2].classList.add('section');
  sections[3].classList.add('section');
  
  // Update all buttons to be "next" type except the last one
  sections.forEach((section, index) => {
    const button = section.querySelector('button');
    if (index === sections.length - 1) {
      button.textContent = 'Enviar';
    }
  });
  
  // Add click handlers to all buttons
  sections.forEach((section, index) => {
    const button = section.querySelector('button');
    button.addEventListener('click', function(e) {
      e.preventDefault();
      
      // If it's the last section, submit the form
      if (index === sections.length - 1) {
        document.querySelector('form').submit();
        return;
      }
      
      // Validate required fields before proceeding
      const requiredFields = section.querySelectorAll('input[required]');
      let isValid = true;
      requiredFields.forEach(field => {
        if (!field.value.trim()) {
          isValid = false;
          field.style.borderColor = 'red';
        }
      });
      
      if (!isValid) return;
      
      // Proceed to next section
      sections[currentSection].classList.remove('active');
      
      // Update progress indicators
      if (currentSection < numbers.length - 1) {
        numbers[currentSection + 1].classList.add('active');
        if (lines[currentSection]) {
          lines[currentSection].classList.add('active');
        }
      }
      
      currentSection++;
      sections[currentSection].classList.add('active');
    });
  });
  
  // Reset border color when user starts typing
  document.querySelectorAll('input[required]').forEach(input => {
    input.addEventListener('input', function() {
      this.style.borderColor = '#BABABA';
    });
  });
});


document.addEventListener("DOMContentLoaded", function () {
  const form = document.querySelector("form");
  const inputs = form.querySelectorAll("input, select");
  
  inputs.forEach(input => {
      input.addEventListener("input", function () {
          validarCampo(this);
      });
  });

  form.addEventListener("submit", function (event) {
      let valido = true;
      inputs.forEach(input => {
          if (!validarCampo(input)) {
              valido = false;
          }
      });

      if (!valido) {
          event.preventDefault();
      }
  });

  function validarCampo(input) {
      const valor = input.value.trim();
      const tipo = input.getAttribute("type");
      const errorMsg = obtenerMensajeError(input);
      let valido = true;

      if (input.hasAttribute("required") && valor === "") {
          valido = false;
      } else if (tipo === "email" && !/^\S+@\S+\.\S+$/.test(valor)) {
          valido = false;
      } else if (tipo === "date" && !/^\d{4}-\d{2}-\d{2}$/.test(valor)) {
          valido = false;
      }

      mostrarError(input, valido, errorMsg);
      return valido;
  }

  function obtenerMensajeError(input) {
      if (input.hasAttribute("required") && input.value.trim() === "") {
          return "Este campo es obligatorio.";
      }
      if (input.type === "email") {
          return "Ingrese un correo válido.";
      }
      if (input.type === "date") {
          return "Seleccione una fecha válida.";
      }
      return "";
  }

  function mostrarError(input, valido, mensaje) {
      let errorSpan = input.nextElementSibling;
      if (!errorSpan || !errorSpan.classList.contains("error-msg")) {
          errorSpan = document.createElement("span");
          errorSpan.classList.add("error-msg");
          input.parentNode.appendChild(errorSpan);
      }

      if (!valido) {
          input.classList.add("input-error");
          errorSpan.textContent = mensaje;
      } else {
          input.classList.remove("input-error");
          errorSpan.textContent = "";
      }
  }
});

function validateSection(current, next) {
  let valid = true;
  let section = document.getElementById(current);
  let inputs = section.querySelectorAll("input");

  inputs.forEach(input => {
    let errorSpan = document.getElementById(input.id + "Error");
    if (!input.value.trim()) {
      errorSpan.textContent = "Este campo es obligatorio";
      valid = false;
    } else {
      errorSpan.textContent = "";
    }
  });

  if (valid) {
    document.getElementById(current).style.display = "none";
    document.getElementById(next).style.display = "block";
  }
}
