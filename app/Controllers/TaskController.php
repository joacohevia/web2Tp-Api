<?php
    include_once 'app/Model/TaskModel.php';
    include_once 'app/View/TaskView.php';
    include_once './helpers/AuthHelpers.php';
    class taskController {
        private $model;//es private porque solo se puede acceder desde aca
        private $view;//esto declara que el controlador siempre va a usar model y view
    
        function __construct() {
             // verifico logueado
            
            $this->model = new taskModel();//dentro de model crea..
            $this->view = new taskView();
        }
    
        function showTasks() {
            // obtengo las tareas del modelo
            $tasks = $this->model->getTasks();
            // acutializar lista
            $this->view->showTask($tasks);
        }

        function allTasks($id) {
            $ListT=$this->model->allTable($id);

            $this->view->showAlltable($ListT);
        }

        function seeCategories() {
            $productos = $this->model->getProductos();

            $this->view->seeProductos($productos);
        }

        function seachCategories() {
            $categoria = $_POST['categoria'];
            /* se valida? if (empty($categoria)) {
                $this->view->showError("Campo incompleto");
                return;
            }*/
            $productos = $this->model->seachProductos($categoria);
            if ($productos) {
                header('Location: ' . BASE_URL);//como muestro la loc
            }
            else {
                $this->view->showError("No se encontro producto");
            }
            
        }
        
    }