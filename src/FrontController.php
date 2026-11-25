<?php
class FrontController
{
    private $prefix;

    public function __construct()
    {
        $this->prefix = "/proyectoUpemor";
    }
    //funcion para obtener la ruta y rutear a la vista que corresponda
    public function getRoute()
    {
        //captura la url actual xe /contacto, /noticias etc
        $uri = parse_url($_SERVER["REQUEST_URI"] ?? "/", PHP_URL_PATH);
        $route = str_replace($this->prefix, "", $uri);
        if ($route === "" || $route === false) {
            $route = "/";
        }

        echo "<h1>" . $route . "</h1>";

        switch ($route) {
            case "/metricas":
                require_once("./view/metricas.php");
                break;
            case "/admisiones":
                require_once("./view/admisiones.php");
                break;
            case "/noticias":
                require_once("./view/noticias.php");
                break;
            //rutas de oferta academica
            case "/ofertaAcademica/main":
                ControllerDegree::getInstance()->main();
                break;
            case "/ofertaAcademica/new":
                ControllerDegree::getInstance()->new();
                break;
            case "/ofertaAcademica/edit":
                ControllerDegree::getInstance()->edit();
                break;
            case "/ofertaAcademica/delete":
                ControllerDegree::getInstance()->delete();
                break;
            default:
                require_once("./view/admisiones.php");
                break;
        }
    }
}
