<?php
include 'templates/lista.phtml';
include 'templates/listaTotal.phtml';
    class taskView {
        function showtask($tasks) {
            seeTask($tasks);
        }
        
        function showAlltable($ListT) {
            AllTable($ListT);
        }

        function showError() {
            echo "<h1> Error view</h1>";
        }
    }