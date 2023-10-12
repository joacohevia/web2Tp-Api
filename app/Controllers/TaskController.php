<?php
    include_once 'app/Model/TaskModel.php';
    include_once 'app/View/TaskView.php';
    include_once './helpers/AuthHelpers.php';
    class taskController {
        private $model_P;
        private $model_U;//es private porque solo se puede acceder desde aca
        private $view_P;//esto declara que el controlador siempre va a usar model y view
        private $view_U;

        function __construct() {
             // verifico logueado
            $this->model_U = new UserModel();
            $this->model_P = new taskModel();//dentro de model crea..
            $this->view_P = new taskView();
            $this->view_U = new UserView();
        }
    
        function showOrders() {
            
            $tasks = $this->model_U->getTasks();
            // acutializar lista
            $this->view_U->showTask($tasks);
        }

        function allOrders($id) {
            $ListT=$this->model_P->allTable($id);

            $this->view_P->showAlltable($ListT);
        }

        function seeCategories() {
            $productos = $this->model_P->getProductos();

            $this->view_P->seeProductos($productos);
        }

        function seachCategories($id) {
            
            $productos = $this->model_P->seachProductos($id);

            $this->view_P->seeProductos($productos);
           
        }
        
    }