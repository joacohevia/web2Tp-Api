<?php
require_once './app/View/AuthView.php';
require_once './app/Model/UserModel.php';
include_once './helpers/AuthHelpers.php';
    class authController {
        private $view;
        private $model;

        function __construct()
        {
            
            $this->view = new AuthView();
            $this->model = new UserModel();
        }
        function showLogin() {
            $this->view->showLogin();
        }
    }