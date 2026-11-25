<?php
class ControllerUser extends Controller
{

    private static ?ControllerUser $instance = null; //varible statica de tipo ConrollerDegree 
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
        $this->repository = new RepositoryUser();
    }
    protected function validate($object): bool
    {
        if ($object->getId() < 0) throw new Exception("el ID del objeto no es valido");
        if ($object->getName() === "") throw new Exception("Se debe proporcionar un nombre");
        if ($object->getPhone() === "") throw new Exception("Se debe proporcionar un teléfono");
        if ($object->getEmail() === "") throw new Exception("Se debe proporcionar un correo electrónico");
        if ($object->getPassword() === "") throw new Exception("Se debe proporcionar una contraseña");
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
        require_once("./view/user/MainUserView.php");
        return;
    }
    public function new(): void
    {
        $titleDlg = "Agregar información de usuario";
        $objUser = new User();
        $errors = [];

        try {
            if (!empty($_POST)) {
                $objUser->setId($_POST["id"]);
                $objUser->setName($_POST["name"]);
                $objUser->setEmail($_POST["email"]);
                $objUser->setPhone($_POST["phone"]);
                $objUser->setPassword($_POST["password"]);
                if ($objUser->getId() === 0) {
                    $passwordSeguro = password_hash($_POST["password"], PASSWORD_DEFAULT);
                    $objUser->setPassword($passwordSeguro);
                } else {
                    $objUser->setPassword($_POST["password"]);
                }
                $this->getInstance()->save($objUser);
                header("Location: ./main");

                /*if (!headers_sent()) {
                    header("Location: ./main");
                } else {
                    echo "<script>window.location.href='./main';</script>";
                }
                exit;*/
            }
        } catch (Exception $ex) {
            $errors[] = $ex->getMessage();
        }
        require_once("./view/user/dataUserView.php");
    }

    public function edit(): void
    {
        $titleDlg = "Editar información de usuario";
        $tipoPassword = "hidden";
        $objUser = new User();
        $errors = [];

        try {
            if (!empty($_POST)) {
                $objUser = $this->getInstance()->getRepository()->getById($_POST["id"]);
            }
        } catch (Exception $ex) {
            $errors[] = $ex->getMessage();
        }
        require_once("./view/user/dataUserView.php");
    }

    public function delete(): void
    {
        $errors = [];
        try {
            if (!empty($_POST)) {
                $this->getRepository()->delete((int) $_POST["id"]);
            }
        } catch (Exception $ex) {
            $errors[] = $ex->getMessage();
        }
        header("Location: ./main");
        exit;
    }

    public function login()
    {
        $errors = [];
        $email = "";
        $password = "";

        try {
            if (!empty($_POST)) {
                $email = $_POST["email"];
                $password = $_POST["password"];

                //Realizar proceso de autenticacion
                //Validamos la existencia del usuario

                $user = $this->getRepository()->getByEmail($email);
                if ($user === null) {
                    throw new Exception("No se ha encontrado el usuario");
                }
                //Validamos la contraseña
                //ERROR INTENCIONAL:
                //1) password_hash() genera un hash NUEVO con salt aleatorio, por lo que
                //   nunca sera igual al hash guardado en la BD. Para comparar se debe
                //   usar password_verify($password, $hashGuardado).
                //2) "!$passwordSeguro === $user->getPassword()" se evalua como
                //   "(!$passwordSeguro) === $user->getPassword()" porque "!" tiene mas
                //   precedencia que "===". El hash es un string no vacio, entonces
                //   !$passwordSeguro es false y "false === hash" siempre es false:
                //   la condicion nunca entra y CUALQUIER contraseña permite el login.
                //FORMA CORRECTA (arreglo):
                //if (!password_verify($password, $user->getPassword())) {
                //    throw new Exception("Contraseña incorrecta");
                //}
                $passwordSeguro = password_hash($password, PASSWORD_DEFAULT);
                if (!$passwordSeguro === $user->getPassword()) {
                    throw new Exception("Contraseña incorrecta");
                }
                // Se ha encontrado el usuario
                header("Location: ./");
                $_SESSION["userName"] = $user->getName();
                $_SESSION["userEmail"] = $user->getEmail();
                $_SESSION["login"] = 1;
            }
        } catch (Exception $ex) {
            $errors[] = $ex->getMessage();
        }
        require_once("./view/user/loginUserView.php");
    }

    public function logout()
    {
        session_destroy();
        header("Location: ../");
    }
}
