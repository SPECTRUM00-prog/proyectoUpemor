// ==========================================================================
// Manipulación del DOM y Scripts Interactivos - UPEMOR (main.js)
// ==========================================================================

document.addEventListener("DOMContentLoaded", () => {
  console.log("Portal UPEMOR iniciado correctamente.");

  // 1. Filtrado dinámico de la Oferta Académica en el DOM
  const filterInput = document.getElementById("filter-carreras");
  const carreraCards = document.querySelectorAll(".carrera-card");

  if (filterInput) {
    filterInput.addEventListener("input", (e) => {
      const searchTerm = e.target.value.toLowerCase().trim();

      carreraCards.forEach((card) => {
        const carreraNombre = (
          card.getAttribute("data-nombre") || ""
        ).toLowerCase();
        if (carreraNombre.includes(searchTerm)) {
          card.style.display = "block";
        } else {
          card.style.display = "none";
        }
      });
    });
  }

  // 2. Interacción con botones "Ver detalles" de la Oferta Académica
  const btnCarreraInfos = document.querySelectorAll(".btn-carrera-info");
  btnCarreraInfos.forEach((btn) => {
    btn.addEventListener("click", (e) => {
      const carreraName =
        e.target.getAttribute("data-carrera") || "Carrera seleccionada";
      alert(
        `Has seleccionado la carrera: ${carreraName}\nPróximamente podrás descargar la tira de materias y mapa curricular.`,
      );
    });
  });

  // 3. Manejo del Formulario de Inicio de Sesión (Modal)
  const loginForm = document.getElementById("login-form");
  const loginAlert = document.getElementById("login-alert");

  if (loginForm) {
    loginForm.addEventListener("submit", (e) => {
      e.preventDefault();
      const userType = document.getElementById("userType").value;
      const username = document.getElementById("username").value;

      // Manipulación del DOM para inyectar notificación de alerta
      loginAlert.innerHTML = `
                <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
                    <i class="fa-solid fa-circle-check me-2"></i>
                    <strong>¡Acceso Autorizado!</strong> Entrando a <strong>${userType}</strong> como <em>${username}</em>.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                </div>
            `;
      loginForm.reset();
    });
  }

  // 4. Manejo del Formulario de Contacto
  const contactForm = document.getElementById("contact-form");
  const contactFeedback = document.getElementById("contact-feedback");

  if (contactForm) {
    contactForm.addEventListener("submit", (e) => {
      e.preventDefault();
      const email = document.getElementById("contactEmail").value;

      contactFeedback.classList.remove("display-none");
      contactFeedback.innerHTML = `
                <span class="text-warning"><i class="fa-solid fa-circle-check me-1"></i> Gracias por comunicarte. Responderemos a <strong>${email}</strong> a la brevedad.</span>
            `;

      contactForm.reset();
      setTimeout(() => {
        contactFeedback.classList.add("display-none");
      }, 6000);
    });
  }

  // 5. Inserción dinámica de contenido en el DOM (Noticias adicionales)
  const btnToggleNoticias = document.getElementById("btn-toggle-noticias");
  const contenedorNoticias = document.getElementById("contenedor-noticias");

  if (btnToggleNoticias && contenedorNoticias) {
    btnToggleNoticias.addEventListener("click", () => {
      const nuevaNoticia = document.createElement("div");
      nuevaNoticia.className = "col-lg-12 mt-3";
      nuevaNoticia.innerHTML = `
                <article class="card shadow-sm border-0 bg-light border-start border-4 border-success">
                    <div class="card-body p-3">
                        <span class="badge bg-secondary mb-1">Evento</span>
                        <h3 class="h6 fw-bold mb-1"><a href="#" class="text-decoration-none text-dark">Simposio Anual de Biotecnología e Informática 2026</a></h3>
                        <p class="small text-muted mb-0">Publicado por: Dirección Académica el <time datetime="2026-10-25">25 de octubre de 2026</time></p>
                    </div>
                </article>
            `;
      contenedorNoticias.appendChild(nuevaNoticia);
      btnToggleNoticias.disabled = true;
      btnToggleNoticias.innerText = "No hay más noticias por mostrar";
    });
  }
});
