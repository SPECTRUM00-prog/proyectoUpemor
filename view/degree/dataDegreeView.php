<section id="oferta" class="py-5 bg-light border-top">
    <div class="container">
        <div class="text-center max-w-700 mx-auto mb-4">
            <h2 class="h3 fw-bold text-dark mb-2"><?= $titleDlg ?></h2>
            <p class="text-muted">Proporciona los datos de la nueva oferta academica</p>

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
                        value="<?= $objDegree->getId() ?>" required>
                    <input type="text" id="name" name="name" class="form-control"
                        placeholder="Proporciona el nombre" value="<?= $objDegree->getName() ?>" required>
                </div>
            </div>
            <div class="row justify-content-center mt-3">
                <div class="col-md-6">
                    <input type="text" id="description" name="description" class="form-control"
                        placeholder="Proporciona la descripción" value="<?= $objDegree->getDescription() ?>" required>
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