<?php
    class taskModel {
          //todas las funciones que conectan a la BD
        //private porque solo yo puedo acceder
        private $db;

        function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=db_web2;charset=utf8', 'root', '');

        }  
        /** Obtiene y devuelve de la base de datos todas las tareas.*/
        function getTasks() {
            $query = $this->db->prepare('SELECT * FROM usuarios');
            $query->execute();

            // $tasks es un arreglo de tareas
            $tasks = $query->fetchAll(PDO::FETCH_OBJ);
            //un arr de tareas y fetch un registro
            return $tasks;//para que se pueda incluir 
        }

        function allTable($id) {
            $query = $this->db->prepare('SELECT pedidos.EstadoPedido, pedidos.FechaEnvio, usuarios.*, productos.Especificaciones, productos.TipoProducto,productos.Cantidad, productos.Precio
            FROM `pedidos`
            INNER JOIN usuarios ON pedidos.IDUsuario = usuarios.IDUsuario
            INNER JOIN productos ON pedidos.IDProducto = productos.IDProducto
            WHERE pedidos.IDPedido = ?');
            $query->execute([$id]); // Usamos un array para pasar el parámetro
            $ListaT = $query->fetchAll(PDO::FETCH_OBJ);
            return $ListaT;
            
        }
        
        function getProductos() {
            $query = $this->db->prepare('SELECT * FROM productos');
            $query->execute();
            $productos = $query->fetchAll(PDO::FETCH_OBJ);
            return $productos;
        }

        function seachProductos($categoria) {
            $query = $this->db->prepare('SELECT * FROM productos WHERE TipoProducto LIKE ?');
            $parametro = "%$categoria%";
            $query->execute([$parametro]);
            $resultados = $query->fetchAll(PDO::FETCH_OBJ);
            
            return $resultados;
        }
    }