<?php
require_once 'app/Controllers/TaskController.php';//usuarios
require_once 'app/Controllers/AuthController.php';//ya ingresado
require_once 'app/Controllers/UserController.php';//lo que puede hacer el usuario

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
        $controller->showOrders();
        break;
    case 'listaTotal':
        $controller = new taskController();
        $controller->allOrders($params[1]);
        break;
    case 'categoria':
        $controller = new taskController();
        $controller->seeCategories();
        break;
    case 'categoriaId':
        $controller = new taskController();
        $controller->seachCategories($params[1]);
        break;


    //usuario
    case 'agregar':
        $controller = new userController();
        $controller->addOrdersForm();
        break;
    case 'addItems':
        $controller = new userController();
        $controller->addOrders();
        break;
    case 'eliminar':
        $controller = new taskController();
        $controller->removeOrders($params[1]);
        break;
    case 'modificar':
        $controller = new taskController();
        $controller->modifyProducts();
        break;

        case 'agregarCat':
            $controller = new taskController();
            $controller->addCategories();
            break;
        case 'eliminarCat':
            $controller = new taskController();
            $controller->removeCategories($params[1]);
            break;
        case 'modificarCat':
            $controller = new taskController();
            $controller->modifyCategories();
            break;

    case 'login':
        $controller = new AuthController();
        $controller->showLogin();
        break;
    case 'auth';
        $controller = new AuthController();
        $controller->auth();
        break;
    case 'logout':
        $controller = new AuthController();
        $controller->logout();
        break;
    default: 
        $controller = new taskController();
        // esta bien? $controller->errorTask();
        break;
}