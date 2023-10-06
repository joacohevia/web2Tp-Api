<?php
require_once 'app/Controllers/TaskController.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'listar'; // accion por defecto
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}

// listar    ->    showTasks(); consulta,lista,muestra
// parsea la accion para separar accion real de parametros
$params = explode('/', $action);


switch ($params[0]) {
    case 'listar':
        $controller = new taskController();
        $controller->showTasks();
        break;
    case 'listaTotal':
        $controller = new taskController();
        $controller->allTasks($params[1]);
        break;
    default: 
        $controller = new taskController();
        $controller->errorTask();
        break;
}