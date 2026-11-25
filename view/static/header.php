<header class="bg-dark text-white py-3 border-bottom border-warning border-3">
    <div class="container d-flex flex-wrap justify-content-between align-items-center">
        <div class="d-flex align-items-center gap-3">
            <img src="<?= $base ?>/resources/imagenes/logo.jpeg" alt="Logotipo oficial UPEMOR"
                class="logo-img rounded bg-white p-1" style="height: 55px; width: auto"
                onerror="this.src = 'https://via.placeholder.com/55?text=UPEMOR'" />
            <h1 class="h4 mb-0 fw-bold text-light">
                Universidad Politécnica del Estado de Morelos
            </h1>
        </div>
        <nav aria-label="Portales institucionales">
            <ul class="nav">
                <?php if (empty($_SESSION)) { ?>
                <li class="nav-item">
                    <a href="<?= $base ?>/user/login" class="nav-link text-white-50 px-2 hover-light">
                        <i class="fa-solid fa-user-graduate me-1"></i> Iniciar Sesión
                    </a>
                </li>
                <?php } else {
                    $username = $_SESSION["userName"];
                    $useremail = $_SESSION["userEmail"];
                ?>
                <li class="nav-item">
                    <a href="#" class="nav-link text-white-50 px-2 hover-light">
                        <i class="fa-solid fa-user me-1"></i> <?= $username ?>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= $base ?>/user/logout" class="nav-link text-white-50 px-2 hover-light">
                        <i class="fa-solid fa-right-from-bracket me-1"></i><?= $username ?> | Logout
                    </a>
                </li>
                <?php } ?>
                <li class="nav-item">
                    <a href="#estudiantes" class="nav-link text-white-50 px-2 hover-light">
                        <i class="fa-solid fa-user-graduate me-1"></i> Portal Estudiantes
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#docentes" class="nav-link text-white-50 px-2 hover-light">
                        <i class="fa-solid fa-chalkboard-user me-1"></i> Portal Docentes
                    </a>
                </li>
                <!--<li class="nav-item">
                    <a href="#login" class="btn btn-sm btn-outline-warning ms-2" data-bs-toggle="modal"
                        data-bs-target="#loginModal">
                        <i class="fa-solid fa-right-to-bracket me-1"></i><?= $username ?>|Logout
                    </a>
                </li> -->
            </ul>
        </nav>
    </div>
</header>