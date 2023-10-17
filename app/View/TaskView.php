<?php

    class taskView {
       
        function showtask($tasks) {
            include_once './templates/lista.phtml';
        }

        function showAlltable($ListT) {
            include_once 'templates/listaTotal.phtml';
        }

        
        function seeProductos($productos) {
            include_once 'templates/list.categories.phtml';
        }
        function showError($error) {
            include_once 'templates/Error.phtml';
        }
    }