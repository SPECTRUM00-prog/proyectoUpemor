<?php
//interconectar la vista con el repositorio
//logica de negocio
abstract class Controller
{

    protected ?Repository $repository;

    public function getRepository(): Repository
    {
        return $this->repository;
    }
    protected abstract function validate(object $object): bool;

    public function save($object): bool
    {
        try {
            if ($this->validate($object)) {
                return $this->repository->save($object);
            }
            return false;
        } catch (Exception $ex) {
            SimpleLogger::getInstance()->error("Se ha generado un error al procesar 
            la funcion save", ["error" => $ex->getMessage(), "clase" => get_class($this)]);
            throw $ex;
        }
    }
}
