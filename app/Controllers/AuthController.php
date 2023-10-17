<?php
require_once './app/View/AuthView.php';
require_once './app/Model/AuthModel.php';
include_once './helpers/AuthHelpers.php';
    class authController {
        private $view;
        private $model;

        function __construct()
        {

            $this->view = new AuthView();
            $this->model = new AuthModel();
        }

        function showLogin() {
            
            $this->view->showLogin();
            //solo muestro el form por eso no va al model
        }

        function auth() {
            $email = $_POST['email'];
            $password = $_POST['password'];

                
            if (empty($email) || empty($password)) {
                $this->view->showLogin('Faltan completar datos');
                return;
            }
            $passwordHash = $password; // contraseña ingresada
            $hashedP = password_hash($passwordHash, PASSWORD_DEFAULT);
            // busco el usuario
            //admin@gmail.com //password: admin
            $user = $this->model->getEmail($email);
            
            if ($user && password_verify($password, $user->Password)) {
                // ACA LO AUTENTIQUE
                
                AuthHelper::login($user);
                
                header('Location: ' . BASE_URL . "listar");
            } 
            else {
                $this->view->showLogin('Usuario inválido');
            }

        }

        public function logout() {
            AuthHelper::logout();
            header('Location: ' . BASE_URL);    
        }
    }
    