<footer class="bg-dark text-white pt-5 pb-3">
    <div class="container">
        <div class="row g-4" id="contacto">
            <div class="col-lg-6">
                <section>
                    <h2 class="h4 fw-bold text-warning mb-3">UPEMOR</h2>
                    <address class="fst-normal text-white-50">
                        <p class="mb-2">
                            <i class="fa-solid fa-location-dot me-2 text-warning"></i>
                            Boulevard Cuauhnáhuac No. 566, Jiutepec Morelos
                        </p>
                        <p class="mb-2">
                            <i class="fa-solid fa-envelope me-2 text-warning"></i>
                            Contacto:
                            <a href="mailto:informes@upemor.edu.mx"
                                class="text-white text-decoration-none hover-warning">informes@upemor.edu.mx</a>
                        </p>
                        <p class="mb-0">
                            <i class="fa-solid fa-phone me-2 text-warning"></i> Teléfono:
                            <a href="tel:1234567" class="text-white text-decoration-none hover-warning">Tel:
                                +52(1234567)</a>
                        </p>
                    </address>
                </section>
            </div>
            <div class="col-lg-6">
                <div class="bg-secondary bg-opacity-25 p-4 rounded border border-secondary shadow-sm">
                    <h3 class="h5 text-warning mb-3">
                        <i class="fa-solid fa-paper-plane me-2"></i>Formulario de Contacto
                    </h3>
                    <form id="contact-form">
                        <div class="mb-2">
                            <input type="email" class="form-control form-control-sm" id="contactEmail"
                                placeholder="Tu correo electrónico" required />
                        </div>
                        <div class="mb-2">
                            <textarea class="form-control form-control-sm" id="contactMessage" rows="2"
                                placeholder="Escribe tu mensaje..." required></textarea>
                        </div>
                        <button type="submit" class="btn btn-warning btn-sm fw-bold w-100">
                            Enviar Mensaje
                        </button>
                    </form>
                    <div id="contact-feedback" class="mt-2 text-center small d-none"></div>
                </div>
            </div>
        </div>
        <hr class="border-secondary my-4" />
        <div class="text-center text-white-50 small">
            <p class="mb-0">
                &copy; 2026 Universidad Politécnica del Estado de Morelos (UPEMOR). Todos los derechos reservados.
            </p>
        </div>
    </div>
</footer>

<!-- Ventana Modal de Login -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header text-white" style="background-color: #004d28;">
                <h3 class="modal-title h5 mb-0" id="loginModalLabel">
                    <i class="fa-solid fa-lock me-2"></i>Iniciar Sesión
                </h3>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Cerrar"></button>
            </div>
            <div class="modal-body p-4">
                <form id="login-form">
                    <div class="mb-3">
                        <label for="userType" class="form-label fw-semibold">Tipo de Portal</label>
                        <select class="form-select" id="userType">
                            <option value="Estudiantes">Portal Estudiantes</option>
                            <option value="Docentes">Portal Docentes</option>
                            <option value="Administrativo">Administrativo</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label fw-semibold">Matrícula / Correo</label>
                        <input type="text" class="form-control" id="username" placeholder="Usuario o correo" required />
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold">Contraseña</label>
                        <input type="password" class="form-control" id="password" required />
                    </div>
                    <button type="submit" class="btn text-white w-100 fw-bold" style="background-color: #006837;">
                        Acceder
                    </button>
                </form>
                <div id="login-alert" class="mt-3"></div>
            </div>
        </div>
    </div>
</div>