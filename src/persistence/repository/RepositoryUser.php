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
}
