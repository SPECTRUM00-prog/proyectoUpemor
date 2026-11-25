<?php
class RepositoryDegree extends Repository
{
    public function __construct()
    {
        $this->table = "degree";
    }
    //convertir un array un objeto
    protected function toObject($row): Degree
    {
        $obj = new Degree();
        $obj->setId($row["id"]);
        $obj->setName($row["name"]);
        $obj->setDescription($row["description"]);
        return $obj;
    }
    //convertir un objeto un array la bd entrega esto trabaja con aray
    protected function toArray($object): array
    {
        return [
            "id" => $object->getId(),
            "name" => $object->getName(),
            "description" => $object->getDescription()
        ];
    }
}
