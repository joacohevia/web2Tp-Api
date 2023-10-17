<?php
require_once './config.php';
require_once 'app/Controllers/TaskController.php';
require_once 'app/Controllers/AuthController.php';//login
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
        //usuario
        case 'agregar':
            $controller = new userController();//NUEVO
            $controller->addOrdersForm();
            break;
        case 'addItems':
            $controller = new userController();
            $controller->addItem();
            break;
        case 'formCategoria'://formulario para agregar cat NUEVO
            $controller = new userController();
            $controller->formCategorias();
            break;
            //datos de form NUEVO
        case 'addCategoria':
            $controller = new userController();
            $controller->addCategoria();
            break;
            case 'login':
                $controller = new authController();
                $controller->showLogin();
                break;
            case 'auth';
                $controller = new authController();
                $controller->auth();
                break;
            case 'logout':
                $controller = new authController();
                $controller->logout();
                break;
    

//esto no
    case 'categoria':
        $controller = new taskController();
        $controller->seachCategories($params[1]);
        break;




    default: 
        $controller = new taskController();
        break;
}