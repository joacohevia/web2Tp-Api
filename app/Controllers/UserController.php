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

        function addItem() {
            $categoria = $_POST['categoria'];
            $tipo = $_POST['tipo'];
            $talle = $_POST['talle'];
            $precio = $_POST['precio'];
            $color = $_POST['color'];
            $stock = $_POST['stock'];
           
        // validaciones
            if (empty($categoria) || empty($tipo) || empty($talle) || empty($precio) || empty($color) || empty($stock)) {
                $this->view->showError("Debe completar todos los campos");
                return;
            }

            $id = $this->model->insertItem($categoria, $tipo, $talle, $precio, $color, $stock);
            if ($id) {
                header('Location: ' . BASE_URL);
            } else {
                $this->view->showError("Error al insertar la tarea");
            }
        }

        function formCategorias() {
            $this->view->showCategorias();
        }

        function addCategoria() {
            $nombre = $_POST['nombre'];
            $ciudad = $_POST['ciudad'];
            $direccion = $_POST['direccion'];
            $fecha = $_POST['fecha'];

            if (empty($nombre) || empty($ciudad) || empty($direccion) || empty($fecha)){
                $this->view->showError("Debe completar todos los campos");
                return;
            }

            $id = $this->model->insertCategoria($nombre, $ciudad, $direccion, $fecha);
            if ($id) {
                header('Location: ' . BASE_URL);//agregar a pagina de categorias
            } else {
                $this->view->showError("Error al insertar la tarea");
            }
            
        }
}