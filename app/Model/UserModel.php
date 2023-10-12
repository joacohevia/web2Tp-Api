<?php
//tabla usuarios
    class UserModel {
        private $db;

        function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=db_web2;charset=utf8', 'root', '');

        }

        function getTasks() {
            $query = $this->db->prepare('SELECT * FROM producto');
            $query->execute();
            // $tasks es un arreglo de tareas
            $tasks = $query->fetchAll(PDO::FETCH_OBJ);
            //un arr de tareas y fetch un registro
            return $tasks;//para que se pueda incluir 
        }
        
        function addOrders() {
            $query = $this->db->prepare('SELECT pedidos.EstadoPedido, pedidos.FechaEnvio, usuarios.*, productos.Especificaciones, productos.TipoProducto,productos.Cantidad, productos.Precio
            FROM `pedidos`
            INNER JOIN usuarios ON pedidos.IDUsuario = usuarios.IDUsuario
            INNER JOIN productos ON pedidos.IDProducto = productos.IDProducto
            WHERE pedidos.IDPedido = ?');
            $query->execute([$id]); // Usamos un array para pasar el parámetro
            $ListaT = $query->fetchAll(PDO::FETCH_OBJ);
            return $ListaT;
        }
    }