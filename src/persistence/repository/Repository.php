<?php
abstract class Repository
{

    //variable no esta inicializada x que debe inicializar en c-hij@s
    protected string $table;
    public function getAll(): array
    {
        try {
            $sql = "SELECT * FROM {$this->table} ORDER BY id";
            $parameters = [];
            $resultset = MyConnection::getInstance()
                ->query($sql, $parameters);
            $array = [];
            foreach ($resultset as $row) {
                $array[] = $this->toObject($row);
            }
            return $array;
        } catch (Exception $ex) {
            SimpleLogger::getInstance()->error("Se ha generado un error al 
            procesar la funcion getAll", ["error" => $ex->getMessage(), "clase" => get_class($this)]);
            throw $ex;
        }
    }
    public function getById(int $id): ?object
    { //recibe un entero y devolvera un objeto
        try {
            $sql = "SELECT * FROM {$this->table} WHERE id = :id";
            $parameters = ["id" => $id]; //Asocia el id con el valor recibido en $id.
            $resultset = MyConnection::getInstance()
                ->query($sql, $parameters); //Ejecuta la consulta preparada en la base de datos.
            $object = null; //Inicializa la variable de retorno en null por si no se 
            //encuentra ningún registro.
            foreach ($resultset as $row) { //Itera sobre el resultado(que normalmente 
                //contendrá 0 o 1 fila).
                $object = $this->toObject($row); //Convierte la fila encontrada en un objeto 
                //y la asigna a $object.
            }

            return $object; //Retorna el objeto encontrado.
        } catch (Exception $ex) {
            SimpleLogger::getInstance()->error("Se ha generado un error al procesar la 
            funcion getById", ["error" => $ex->getMessage(), "clase" => get_class($this)]);
            throw $ex;
        }
    }
    public function save($object)
    { //recibe un objeto para guardarlo en la bd.
        try {
            $array = $this->toArray($object); //Convierte el objeto recibido en un arreglo 
            //asociativo (['columna' => 'valor']) usando el método toArray() de la clase hija
            if ($array["id"] === 0) $array["id"] = null; //Si el id del objeto es 0(convención 
            //para indicar que es un registro nuevo), lo cambia a null para que la base de 
            //datos le asigne un ID autoincremental.
            $keys = array_keys($array); //Extrae únicamente los nombres de las columnas 
            //(las llaves del arreglo) en una lista simple.

            $keysNames = ""; //Inicializan dos cadenas vacías que servirán para armar la lista 
            //de columnas y la lista de marcadores SQL.
            $keysValues = "";
            foreach ($keys as $key) { //Recorre cada nombre de columna.
                $keysNames .= $key . ",";
                $keysValues .= ":" . $key . ",";
            }
            $keysNames = str_replace(",)", "", $keysNames .= ")");
            $keysValues = str_replace(",)", "", $keysValues .= ")");
            $sql = "REPLACE INTO {$this->table}({$keysNames}) VALUES ($keysValues)"; //Arma una 
            //sentencia SQL REPLACE INTO, la cual inserta el registro si el id no existe, o lo reemplaza si ya existe.
            $response = MyConnection::getInstance() //Ejecuta la consulta de escritura (execute) 
                //pasando $array como parámetros; $response suele devolver el número de filas afectadas.
                ->execute($sql, $array);
            return $response > 0;
        } catch (Exception $ex) {
            SimpleLogger::getInstance()->error("Se ha generado un error al procesar la 
            funcion Save", ["error" => $ex->getMessage(), "clase" => get_class($this)]);
            throw $ex;
        }
    }
    public function delete(int $id): bool
    { //bool se borro o no se borro
        try {
            $sql = "DELETE FROM {$this->table} WHERE id = :id";
            $parameters = ["id" => $id];
            $response = MyConnection::getInstance() //variable respuesta que trae la instancia de la conexion 
                //::llamando mtodo statico o de clase 
                ->execute($sql, $parameters);
            return $response > 0; //devuelve la cantidad de registros que borro
        } catch (Exception $ex) {
            SimpleLogger::getInstance()->error("Se ha generado un error al procesar 
            la funcion delete", ["error" => $ex->getMessage(), "clase" => get_class($this)]);
            throw $ex;
        }
    }
    //convierto un arreglo en objeto
    abstract protected function toObject($row): object;
    //convierto un objeto a arreglo
    abstract protected function toArray($object): array;
}
