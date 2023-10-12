<?php
     include_once 'app/Model/UserModel.php';
     include_once 'app/View/UserView.php';
    
    class userController {
        private $view;
        private $model;

        function __construct()
        {
            
            $this->view = new UserView();
            $this->model = new UserModel();
        }

        function addOrdersForm() {
            $this->view->addOrders();
        }

        function addOrders() {
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $ciudad = $_POST['ciudad'];
            $correo = $_POST['correo'];
            $telefono = $_POST['telefono'];
            $estado = $_POST['estado'];
            $fecha = $_POST['fecha'];
            $especificaciones = $_POST['especificaciones'];
            

        // validaciones
        if (empty($title) || empty($priority)) {
            $this->view->showError("Debe completar todos los campos");
            return;
        }

        $id = $this->model->insertTask($title, $description, $priority);
        if ($id) {
            header('Location: ' . BASE_URL);
        } else {
            $this->view->showError("Error al insertar la tarea");
        }

            $this->model->addOrders();

        }
    }