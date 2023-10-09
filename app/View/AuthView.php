<?php

    class AuthView {

        function showLogin($error = null) {
            //error es null y sino 
            require_once './templates/login.phtml';
        }
    }