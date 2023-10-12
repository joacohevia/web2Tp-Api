<?php

class AuthHelper {
    public static function init() {
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();//comprueba si esta activa,sino crea una nueva
        }
    }

    public static function login($usuario) {
        AuthHelper::init();//ya inicio session
        $_SESSION['USER_ID'] = $usuario->id;
        $_SESSION['USER_EMAIL'] = $usuario->email; 
    }

    public static function logout() {
        AuthHelper::init();//cierra session 
        session_destroy();
    }

    public static function verify() {
        AuthHelper::init();//me lleva al login 
        if (!isset($_SESSION['USER_ID'])) {
            header('Location: ' . BASE_URL . '/login');
            die();
        }
    }
}