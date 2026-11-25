<!-- Main User -->
<section id="usuarios" class="py-5 bg-light border-top">
    <div class="container">
        <div class="text-center max-w-700 mx-auto mb-4">
            <h2 class="h3 fw-bold text-dark mb-2">Usuarios</h2>
            <p class="text-muted">Listado de USUARIOS del sistema</p>
            <div class="row justify-content-center mt-3">
                <div class="col-md-6">
                    <input type="text" id="filter-usuarios" class="form-control"
                        placeholder="🔍 Filtrar por nombre de usuario (ej. Admin)..."> <!-- filter-carrerras -->
                </div>
                <div class="col-md-3">
                    <a href="./new">
                        <button class="btn btn-outline-primary btn-sm mt-2">Agregar nuevo usuario</button>
                    </a>
                </div>
                <div class="col-md-12">
                    <!-- Sección de errores -->
                    <p class="text-error">
                        <?php foreach ($errors as $error) { ?>
                    <h5 style="color: #F54927;"><?= $error ?></h5><?php } ?>
                    </p>
                </div>
            </div>
        </div>

        <div class="row g-4" id="usuarios-list">
            <!-- carreras-list -->
            <?php
            foreach ($listUser as $user) { ?>
            <div class="col-md-4 usuario-card" data-nombre="<?= $user->getName() ?>">
                <div class="card h-100 shadow-sm border-0 hover-lift text-center">
                    <div class="card-body p-4">
                        <div class="bg-success text-white rounded-circle mx-auto mb-2 d-flex align-items-center justify-content-center"
                            style="width: 60px; height: 60px;">
                            <i class="fa-solid fa-user fs-4"></i>
                        </div>
                        <h3 class="h5 fw-bold mb-2"><?= $user->getName() ?></h3>
                        <p class="text-muted small"><?= $user->getEmail() ?></p>

                        <div class="d-flex justify-content-center align-items-center gap-2 mt-3">
                            <button class="btn btn-outline-primary btn-sm btn-usuario-info"
                                data-usuario="<?= $user->getName() ?>">Ver</button> <!-- data-carrera -->

                            <form method="post" action="./edit" class="m-0">
                                <input type="hidden" name="id" value="<?= $user->getId() ?>" required>
                                <button type="submit" class="btn btn-outline-warning btn-sm">Editar</button>
                            </form>

                            <form method="post" action="./delete" class="m-0">
                                <input type="hidden" name="id" value="<?= $user->getId() ?>" required>
                                <button type="submit" class="btn btn-outline-danger btn-sm">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
</section>