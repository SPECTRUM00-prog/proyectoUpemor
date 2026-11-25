<?php
ob_start();
require_once("./src/loader.php");
//En que ruta se ejecuta el script
$base = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'])), '/');

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Universidad Politécnica del Estado de Morelos - UPEMOR</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Hoja de Estilos Personalizada -->
    <link rel="stylesheet" href="<?= $base ?>/resources/style.css">
</head>

<body>
    <!-- Imprime la ruta en la etiqueta h1 -->

    <!-- rutas estaticas -->
    <?php include_once("./view/static/header.php") ?>
    <?php include_once("./view/static/navigator.php") ?>

    <!-- Contenido Principal -->
    <main id="inicio">
        <?php
        //delega la lógica al objeto $frontController. El método getRoute($ruta) 
        //evalúa la URL capturada en $ruta y decide qué vista o controlador 
        //interno debe ejecutarse e imprimirse en ese espacio.
        $frontController->getRoute();
        ?>
    </main>
    <!-- rutas estaticas -->
    <?php include_once("./view/static/footer.php") ?>

    <!-- Script Bootstrap 5 Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Script Personalizado JS -->
    <script src="<?= $base ?>/resources/main.js"></script>
</body>

</html>