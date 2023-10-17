<?php
    include_once 'app/Model/TaskModel.php';
    include_once 'app/Model/UserModel.php';
    include_once 'app/View/TaskView.php';
    include_once 'app/View/UserView.php';
    include_once './helpers/AuthHelpers.php';
    class taskController {
        private $model_P;
        private $view_P;//esto declara que el controlador siempre va a usar model y view

        function __construct() {
            $this->model_P = new taskModel();//dentro de model crea..
            $this->view_P = new taskView();
        }
    
        function showOrders() {
            $tasks = $this->model_P->getTasks();
            // acutializar lista
            $this->view_P->showTask($tasks);
        }

        function allOrders($id) {
            $ListT=$this->model_P->allTable($id);

            $this->view_P->showAlltable($ListT);
        }

       
        function seachCategories($id) {
            $productos = $this->model_P->seachProductos($id);

            $this->view_P->seeProductos($productos);
           
        }
        
    }