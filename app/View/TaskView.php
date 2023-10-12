<?php

    class taskView {
       
        
        function showAlltable($ListT) {
            $count = count($ListT);
            include_once 'templates/listaTotal.phtml';
        }

        
        function seeProductos($productos) {
            $count = count($productos);
            include_once 'templates/list.categories.phtml';
        }
        function showError($error) {
            include_once 'templates/Error.phtml';
        }
    }