<!-- Navegación Principal -->
<nav class="navbar navbar-expand-lg navbar-dark bg-success sticky-top shadow-sm" aria-label="Navegación Principal">
    <div class="container">
        <h2 class="visually-hidden">Navegación Principal</h2>
        <a class="navbar-brand d-lg-none fw-bold" href="<?= $base ?>/">UPEMOR</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain"
            aria-controls="navbarMain" aria-expanded="false" aria-label="Alternar navegación">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarMain">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 w-100 justify-content-around fw-semibold">
                <li class="nav-item"><a class="nav-link active" href="<?= $base ?>/"><i
                            class="fa-solid fa-house me-1"></i> Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= $base ?>/metricas"><i
                            class="fa-solid fa-building me-1"></i> Institución</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= $base ?>/ofertaAcademica/main"><i
                            class="fa-solid fa-graduation-cap me-1"></i> Oferta Académica</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= $base ?>/admisiones"><i
                            class="fa-solid fa-file-pen me-1"></i> Admisiones</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= $base ?>/#contacto"><i
                            class="fa-solid fa-envelope me-1"></i> Contacto</a></li>
            </ul>
        </div>
    </div>
</nav>