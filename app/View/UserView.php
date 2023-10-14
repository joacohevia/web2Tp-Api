<?php 
    class UserView {

       

        function addOrders() {
            require_once 'templates/formAdd.phtml';
        }

        function showCategorias() {
            require_once 'templates/form.Categorias.phtml';
        }

        function showError($error=null) {
            require_once 'templates/Error.phtml';
        }
    }