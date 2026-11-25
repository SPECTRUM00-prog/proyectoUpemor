<section id="oferta" class="py-5 bg-light border-top">
    <div class="container">
        <div class="text-center mx-auto mb-4" style="max-width: 650px">
            <h2 class="h3 fw-bold text-dark mb-2">Oferta Académica</h2>
            <p class="text-muted">
                Conoce nuestras facultades y programas académicos de grado y posgrado
            </p>

            <div class="row justify-content-center mt-3">
                <div class="col-md-8">
                    <input type="text" id="filter-carreras" class="form-control shadow-sm"
                        placeholder="🔍 Filtrar carrera (ej. Biotecnología)..." />
                </div>
            </div>
        </div>

        <div class="row g-4" id="carreras-list">
            <div class="col-md-4 carrera-card" data-nombre="administración de empresas">
                <div class="card h-100 shadow-sm border-0 hover-lift text-center">
                    <div class="card-body p-4">
                        <div class="bg-primary text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center"
                            style="width: 65px; height: 65px">
                            <i class="fa-solid fa-chart-line fs-4"></i>
                        </div>
                        <h3 class="h5 fw-bold mb-2">Administración de Empresas</h3>
                        <p class="text-muted small">
                            Formación profesional en gestión estratégica, finanzas y
                            desarrollo de negocios sustentables.
                        </p>
                        <button class="btn btn-outline-primary btn-sm mt-2 btn-carrera-info"
                            data-carrera="Administración de Empresas">
                            Ver detalles
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-md-4 carrera-card" data-nombre="biotecnología">
                <div class="card h-100 shadow-sm border-0 hover-lift text-center">
                    <div class="card-body p-4">
                        <div class="bg-success text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center"
                            style="width: 65px; height: 65px">
                            <i class="fa-solid fa-dna fs-4"></i>
                        </div>
                        <h3 class="h5 fw-bold mb-2">Biotecnología</h3>
                        <p class="text-muted small">
                            Innovación y desarrollo biotecnológico para los sectores
                            agrícola, ambiental e industrial.
                        </p>
                        <button class="btn btn-outline-success btn-sm mt-2 btn-carrera-info"
                            data-carrera="Biotecnología">
                            Ver detalles
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-md-4 carrera-card" data-nombre="tecnologías de la información">
                <div class="card h-100 shadow-sm border-0 hover-lift text-center">
                    <div class="card-body p-4">
                        <div class="bg-info text-white rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center"
                            style="width: 65px; height: 65px">
                            <i class="fa-solid fa-code fs-4"></i>
                        </div>
                        <h3 class="h5 fw-bold mb-2">Tecnologías de la Información</h3>
                        <p class="text-muted small">
                            Especialización en desarrollo de software, ciberseguridad,
                            redes e inteligencia artificial.
                        </p>
                        <button class="btn btn-outline-info btn-sm mt-2 btn-carrera-info"
                            data-carrera="Tecnologías de la Información">
                            Ver detalles
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>