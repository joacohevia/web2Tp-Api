<?php
//tabla productos
require_once 'app/Model/model.php'; 
    class taskModel extends Model{
          //todas las funciones que conectan a la BD
        //private porque solo yo puedo acceder

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