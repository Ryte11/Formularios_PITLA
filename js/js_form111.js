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

input{
    height: 60px;
    border-radius: 16px;
    border: solid 3px #BABABA;
    padding: 10px;
}

input::placeholder{
    margin-left: 10px;
    font-size: 18px;
    font-family: 'popinsBold';
}

input[type="date"] {
    height: 60px;
    border-radius: 16px;
    border: solid 3px #BABABA;
    padding: 10px;
    font-family: 'popinsBold';
    font-size: 18px;
    color: #666;
    position: relative;
    cursor: pointer;
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

function showAlert(message, type = 'danger') {
  const alertContainer = document.getElementById('alertContainer');
  const alertId = `alert-${Date.now()}`;

  const alertHTML = `
      <div id="${alertId}" class="alert alert-${type} alert-dismissible fade show" role="alert">
          ${message}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
  `;

  alertContainer.insertAdjacentHTML('beforeend', alertHTML);

  // Auto-cerrar la alerta después de 5 segundos
  setTimeout(() => {
    const alert = document.getElementById(alertId);
    if (alert) {
      const bsAlert = new bootstrap.Alert(alert);
      bsAlert.close();
    }
  }, 5000);
}


// Add the styles to the document
const styleSheet = document.createElement("style");
styleSheet.textContent = styles;
document.head.appendChild(styleSheet);

// JavaScript for handling section navigation
document.addEventListener('DOMContentLoaded', function () {
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
  // Mover el event listener de los inputs file fuera del click del botón
  document.querySelectorAll('input[type="file"]').forEach(input => {
    input.addEventListener('change', function () {
      this.closest('label').style.borderColor = '#BABABA';
    });
  });

  sections.forEach((section, index) => {
    const button = section.querySelector('button');
    button.addEventListener('click', function (e) {
      e.preventDefault();

      const requiredFields = section.querySelectorAll('input[required], select[required]');
      let isValid = true;
      let errorMessages = [];

      requiredFields.forEach(field => {
        if (field.type === 'file') {
          const files = field.files;
          if (!files || files.length === 0) {
            isValid = false;
            field.closest('label').style.borderColor = 'red';
            const labelText = field.closest('label').textContent.trim();
            errorMessages.push(`Debe ${labelText}`);
          }
        } else if (!field.value.trim()) {
          isValid = false;
          field.style.borderColor = 'red';
          const labelText = field.previousElementSibling ?
            field.previousElementSibling.textContent.trim() :
            field.closest('div').querySelector('label').textContent.trim();
          errorMessages.push(`El campo ${labelText} es obligatorio`);
        }
      });

      if (!isValid) {
        showAlert("Debe llenar los campos obligatorios", 'danger');
        return;
      }

      // Si es la última sección y todos los campos son válidos, enviar el formulario
      if (index === sections.length - 1) {
        showAlert('Formulario enviado correctamente', 'success');
        setTimeout(() => {
          document.querySelector('form').submit();
        }, 1000);
        return;
      }

      // Si no es la última sección, continuar con la navegación normal
      sections[currentSection].classList.remove('active');
      if (currentSection < numbers.length - 1) {
        numbers[currentSection + 1].classList.add('active');
        if (lines[currentSection]) {
          lines[currentSection].classList.add('active');
        }
      }

      currentSection++;
      sections[currentSection].classList.add('active');
      showAlert('Sección completada correctamente', 'success');
    });
  });

  // Reset border color when user starts typing
  document.querySelectorAll('input[required]').forEach(input => {
    input.addEventListener('input', function () {
      this.style.borderColor = '#BABABA';
    });
  });
});




