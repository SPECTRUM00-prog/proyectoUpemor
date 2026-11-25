<?php
class ControllerDegree extends Controller
{

    private static ?ControllerDegree $instance = null; //varible statica de tipo ConrollerDegree 
    //llamada $instance nulla
    public static function getInstance(): self
    { //metodo paa recuperar una instancia de tipo 
        //ControllerDegree
        if (self::$instance === null) { //si 
            self::$instance = new self();
        }
        return self::$instance;
    }
    public function __construct()
    {
        $this->repository = new RepositoryDegree();
    }
    protected function validate($object): bool
    {
        if ($object->getId() < 0) throw new Exception("el ID del objeto no es valido");
        if ($object->getName() === "") throw new Exception("Se debe proporcionar un nombre");
        if ($object->getDescription() === "") throw new Exception("Se debe proporcionar una descripción");
        return true;
    }
    public function main(): void
    {
        $listDegree = array();
        $errors = [];
        try {
            $listDegree = $this->getRepository()->getAll();
        } catch (Exception $ex) {
            $errors[] = $ex->getMessage();
        }
        require_once("./view/degree/MainDegreeView.php");
        return;
    }
    public function new(): void
    {
        $titleDlg = "Agregar información de oferta academica";
        $objDegree = new Degree();
        $errors = [];

        try {
            if (!empty($_POST)) {
                $objDegree->setId(isset($_POST["id"]) ? (int)$_POST["id"] : 0);
                $objDegree->setName($_POST["name"]);
                $objDegree->setDescription($_POST["description"]);
                $this->save($objDegree); //este es metodo save le envio ebjDegree

                if (!headers_sent()) {
                    header("Location: ./main");
                } else {
                    echo "<script>window.location.href='./main';</script>";
                }
                exit;
            }
        } catch (Exception $ex) {
            $errors[] = $ex->getMessage();
        }
        require_once("./view/degree/dataDegreeView.php");
    }
    public function edit(): void
    {
        $titleDlg = "Editar información de oferta academica";
        $objDegree = new Degree();
        $errors = [];

        try {
            if (!empty($_POST)) {
                $objDegree = $this->getRepository()->getById((int)$_POST["id"]);
            }
        } catch (Exception $ex) {
            $errors[] = $ex->getMessage();
        }
        require_once("./view/degree/dataDegreeView.php");
    }
    public function delete(): void
    {
        $errors = [];
        try {
            if (!empty($_POST)) {
                $this->repository->delete((int)$_POST["id"]);
            }
        } catch (Exception $ex) {
            $errors[] = $ex->getMessage();
        }

        if (!headers_sent()) {
            header("Location: ./main");
        } else {
            echo "<script>window.location.href='./main';</script>";
        }
        exit;
    }
}
