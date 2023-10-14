<?php
//tabla productos
    class taskModel {
          //todas las funciones que conectan a la BD
        //private porque solo yo puedo acceder
        private $db;

        function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=db_web2;charset=utf8', 'root', '');

        }  

        function getTasks() {
            $query = $this->db->prepare('SELECT * FROM productos');
            $query->execute();
            // $tasks es un arreglo de tareas
            $tasks = $query->fetchAll(PDO::FETCH_OBJ);
            //un arr de tareas y fetch un registro
            return $tasks;//para que se pueda incluir 
        }
        
        function allTable($id) {
            $query = $this->db->prepare('SELECT * FROM productos WHERE IDProducto = ?');
            $query->execute([$id]); 
            $ListaT = $query->fetchAll(PDO::FETCH_OBJ);
            return $ListaT;
            
        }
        
        function seachProductos($categoria) {
            $query = $this->db->prepare('SELECT * FROM productos WHERE TipoProducto LIKE ?');
            $parametro = "%$categoria%";
            $query->execute([$parametro]);
            $resultados = $query->fetchAll(PDO::FETCH_OBJ);
            
            return $resultados;
        }
    }