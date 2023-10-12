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
            //solo muestro el form por eso no va al model
        }

        function auth() {
            $email = $_POST['email'];
            $password = $_POST['password'];

            if (empty($email) || empty($password)){
                $this->view->showLogin('Faltan completar campos');
                return;
            }
            $passwordHash = $password; // contraseña ingresada
            $hashedP = password_hash($passwordHash, PASSWORD_DEFAULT);

            $usuario = $this->model->getEmail($email);
            if ($usuario && password_verify($password, $usuario->password)) {
                //ya esta encriptada??
                AuthHelper::login($usuario);

                header('Location: '. BASE_URL);
            }
            else {
                $this->view->showLogin('Usuario invalido');
            }
        }

        

        public function logout() {
            AuthHelper::logout();
            header('Location: ' . BASE_URL);    
        }
    }
    