<?php 
    class UserView {

        function showtask($tasks) {
            $count = count($tasks);
            include_once 'templates/lista.phtml';
        }

        function addOrders() {
            require_once 'templates/formAdd.php';
        }
    }