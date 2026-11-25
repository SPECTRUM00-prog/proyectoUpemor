<?php
class RepositoryUser extends Repository
{
    public function __construct()
    {
        $this->table = "user";
    }
    //convertir un array un objeto
    protected function toObject($row): User
    {
        $obj = new User();
        $obj->setId($row["id"]);
        $obj->setName($row["name"]);
        $obj->setEmail($row["email"]);
        $obj->setPhone($row["phone"]);
        $obj->setPassword($row["password"]);
        return $obj;
    }
    //convertir un objeto un array la bd entrega esto trabaja con aray
    protected function toArray($object): array
    {
        return [
            "id" => $object->getId(),
            "name" => $object->getName(),
            "email" => $object->getEmail(),
            "phone" => $object->getPhone(),
            "password" => $object->getPassword()
        ];
    }

    public function getByEmail(string $email): ?User
    {
        try {
            $sql = "SELECT * FROM {$this->table} WHERE email = :email LIMIT 1";
            $parameters = [":email" => $email];
            $resultset = MyConnection::getInstance()
                ->query($sql, $parameters);
            $object = null;
            foreach ($resultset as $row) {
                $object = $this->toObject($row);
            }
            return $object;
        } catch (Exception $ex) {
            SimpleLogger::getInstance()->error("Se ha generado un error al obtener la funcion getByEmail", ["error" => $ex->getMessage(), "clase" => get_class($this)]);
            throw $ex;
        }
    }
}