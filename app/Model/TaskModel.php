<?php
    class taskModel {
          //todas las funciones que conectan a la BD
        //private porque solo yo puedo acceder
        private function Conection() {
            return new PDO('mysql:host=localhost;dbname=db_web2;charset=utf8', 'root', '');
        }

        /** Obtiene y devuelve de la base de datos todas las tareas.*/
        function getTasks() {
            
            $db = $this->Conection();//para usar coneccion
            
            $query = $db->prepare('SELECT * FROM usuarios');
            $query->execute();

            // $tasks es un arreglo de tareas
            $tasks = $query->fetchAll(PDO::FETCH_OBJ);
            //un arr de tareas y fetch un registro
            return $tasks;//para que se pueda incluir 
        }

        function allTable($id) {
            $db = $this->Conection();
            $query = $db->prepare('SELECT pedidos.EstadoPedido, pedidos.FechaEnvio, usuarios.*, productos.Especificaciones, productos.TipoProducto, productos.Precio
            FROM `pedidos`
            INNER JOIN usuarios ON pedidos.IDUsuario = usuarios.IDUsuario
            INNER JOIN productos ON pedidos.IDProducto = productos.IDProducto
            WHERE pedidos.IDPedido = ?');
            $query->execute([$id]); // Usamos un array para pasar el parámetro
            $ListaT = $query->fetchAll(PDO::FETCH_OBJ);
            return $ListaT;
            
        }
        
    }