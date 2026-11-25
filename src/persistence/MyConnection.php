<?php
class MyConnection
{
    private ?PDO $pdo = null;
    private string $host;
    private string $user;
    private string $password;
    private string $database;
    private int $port;

    private static ?MyConnection $instance = null;
    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    private function __construct(
        string $host = "localhost",
        string $database = "proyectoupemor",
        string $user = "diego",
        string $password = "123",
        int $port = 3306
    ) {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->database = $database;
        $this->port = $port;
    }
    public function connect(): PDO
    {
        if ($this->pdo === null) {
            SimpleLogger::getInstance()->info("Se inicia proceso de creación de conexión", ["clase" => get_class($this)]);
            //Data Source Name
            $dsn = "mysql:host={$this->host};port={$this->port};dbname={$this->database};charset=utf8mb4";
            try {
                $this->pdo = new PDO(
                    $dsn,
                    $this->user,
                    $this->password,
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                        PDO::ATTR_EMULATE_PREPARES => false,
                    ]
                );
                SimpleLogger::getInstance()->info("Se ha generado con exito la conexión a la base de datos", ["clase" => get_class($this)]);
            } catch (PDOException $ex) {
                SimpleLogger::getInstance()->error("Se ha generado un error al realizar la conexión con exito", ["error" => $ex->getMessage(), "clase" => get_class($this)]);
                die("Error de conexión: " . $ex->getMessage());
            }
        }
        return $this->pdo;
    }
    //Metodo de consultas SELECT
    public function query(string $sql, array $params = []): array
    {
        try {
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute($params);
            return $stmt->fetchAll();
        } catch (Exception $ex) {
            SimpleLogger::getInstance()->error("Se ha generado un error al procesar la funcion query", ["error" => $ex->getMessage(), "clase" => get_class($this)]);
            throw $ex;
        }
    }
    //Metodo para operaciones de escritura (INSERT, UPDATE, DELETE)
    public function execute(string $sql, array $params = []): int
    {
        try {
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute($params);
            return $stmt->rowCount();
        } catch (Exception $ex) {
            SimpleLogger::getInstance()->error("Se ha generado un error al procesar la funcion execute", ["error" => $ex->getMessage(), "clase" => get_class($this)]);
            throw $ex;
        }
    }
    public function close(): void
    {
        $this->pdo = null;
        SimpleLogger::getInstance()->info("Se ha cerrado la conexión con exito");
    }
}

class_alias('MyConnection', 'MyConnetion');
