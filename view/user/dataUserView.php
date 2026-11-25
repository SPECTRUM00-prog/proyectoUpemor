<section id="usuarios" class="py-5 bg-light border-top">
    <!-- oferta -->
    <div class="container">
        <div class="text-center max-w-700 mx-auto mb-4">
            <h2 class="h3 fw-bold text-dark mb-2"><?= $titleDlg ?></h2>
            <p class="text-muted">Proporciona los datos del nuevo usuario</p>

            <!-- Sección de errores -->
            <p class="text-error">
                <?php
                foreach ($errors as $error) { ?>
            <h5 style="color: #F54927;"><?= $error ?></h5>
            <?php
                } ?>
            </p>

            <form method="post" action="./new">
                <div class="row justify-content-center mt-3">
                    <div class="col-md-6">
                        <input type="hidden" id="id" name="id" class="form-control" placeholder=""
                            value="<?= $objUser->getId() ?>" required>
                        <input type="text" id="name" name="name" class="form-control"
                            placeholder="Proporciona el nombre" value="<?= $objUser->getName() ?>" required>
                    </div>
                </div>
                <div class="row justify-content-center mt-3">
                    <div class="col-md-6">
                        <input type="email" id="email" name="email" class="form-control"
                            placeholder="Proporciona el correo electrónico" value="<?= $objUser->getEmail() ?>"
                            required>
                    </div>
                </div>
                <div class="row justify-content-center mt-3">
                    <div class="col-md-6">
                        <input type="text" id="phone" name="phone" class="form-control"
                            placeholder="Proporciona el teléfono" value="<?= $objUser->getPhone() ?>" required>
                    </div>
                </div>
                <div class="row justify-content-center mt-3">
                    <div class="col-md-6">
                        <input type="password" id="password" name="password" class="form-control"
                            placeholder="Proporciona la contraseña" value="<?= $objUser->getPassword() ?>" required>
                    </div>
                </div>
                <div class="row justify-content-center mt-3">
                    <div class="col-md-2">
                        <input type="submit" class="btn btn-outline-primary" value="Guardar">
                    </div>
                    <div class="col-md-2">
                        <a href="./main">
                            <input type="button" class="btn btn-outline-secondary" value="Cancelar">
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>