<?php
/*
Este archivo tiene como fianalidad realizar la carga de todas las clases necesarias para
Ejecutar el proyecto
*/

/*Cargar utilidades */
require_once("./src/utils/SimpleLogger.php");
/*Cargando persistencia */
require_once("./src/persistence/MyConnection.php");

/*cargando entidades */
require_once("./src/persistence/entity/Degree.php");
require_once("./src/persistence/entity/User.php");

/* Cargando respositorios */
require_once("./src/persistence/repository/Repository.php");
require_once("./src/persistence/repository/RepositoryDegree.php");
require_once("./src/persistence/repository/RepositoryUser.php");

/* Cargando Controladores */
require_once("./src/controller/Controller.php");
require_once("./src/controller/ControllerDegree.php");
require_once("./src/controller/ControllerUser.php");

/*cargamos controlador de vistas */
require_once("./src/FrontController.php");

/*
El segundo objetivo de este archivo es crear las Instancias de las clases que vamos a
estar ocupando
*/

/*Cargar instancia de utilerias */
SimpleLogger::getInstance()->info("Se ha creado el logger con exito", []);

/*cargar  la instacia de presistencia */
MyConnection::getInstance()->connect();
SimpleLogger::getInstance()->info("Se ha probado la conexión con exito", []);

/*Cargando instancias de controladores de vista*/
$frontController = new FrontController();
SimpleLogger::getInstance()->info("Se ha creado el frontController con exito", []);