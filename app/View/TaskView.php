<?php

    class taskView {
        function showtask($tasks) {
            $count = count($tasks);
            include_once 'templates/lista.phtml';
        }
        
        function showAlltable($ListT) {
            $count = count($ListT);
            include_once 'templates/listaTotal.phtml';
        }

        function showError($error) {
            include_once 'templates/Error.phtml';
        }

        function seeProductos($productos) {
            $count = count($productos);
            include_once 'templates/list.categories.phtml';
        }
    }