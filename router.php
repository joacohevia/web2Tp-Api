<?php
require_once 'app/Controllers/TaskController.php';
require_once 'app/Controllers/AuthController.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'listar'; // accion por defecto
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}

// listar    ->    showTasks(); consulta,lista,muestra
// parsea la accion para separar accion real de parametros
$params = explode('/', $action);


switch ($params[0]) {
    //publico
    case 'listar':
        $controller = new taskController();
        $controller->showTasks();
        break;
    case 'listaTotal':
        $controller = new taskController();
        $controller->allTasks($params[1]);
        break;
    case 'categoria':
        $controller = new taskController();
        $controller->seeCategories();
        break;
    case 'buscarCat':
        $controller = new taskController();
        $controller->seachCategories();
        break;

    //usuario
    case 'login':
        $controller = new AuthController();
        $controller->showLogin();
        break;
    default: 
        $controller = new taskController();
        // esta bien? $controller->errorTask();
        break;
}