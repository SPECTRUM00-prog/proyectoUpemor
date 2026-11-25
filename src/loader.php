<?php
/*
Este archivo tiene como fianalidad realizar la carga de todas las clases necesarias para
Ejecutar el proyecto
*/
/*cargamos controlador de vistas */
require_once("./src/FrontController.php");
/*Cargar utilidades */
require_once("./src/utils/SimpleLogger.php");
/*Cargando persistencia */
require_once("./src/persistence/MyConnection.php");

/*cargando entidades */
require_once("./src/persistence/entity/Degree.php");

/* Cargando respositorios */
require_once("./src/persistence/repository/Repository.php");
require_once("./src/persistence/repository/RepositoryDegree.php");

/* Cargando Controladores */
require_once("./src/controller/Controller.php");
require_once("./src/controller/ControllerDegree.php");

/*
El segundo objetivo de este archivo es crear las Instancias de las clases que vamos a
estar ocupando
*/
$frontController = new FrontController();

/*Cargar instancia de utilerias */
SimpleLogger::getInstance()->info("Se ha creado el logger con exito", []);

/*cargar  la instacia de presistencia */
MyConnection::getInstance()->connect();
SimpleLogger::getInstance()->info("Se ha probado la conexión con exito", []);
