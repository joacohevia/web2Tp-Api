<?php
//tabla pedidos
    class taskModel {
          //todas las funciones que conectan a la BD
        //private porque solo yo puedo acceder
        private $db;

        function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=db_web2;charset=utf8', 'root', '');

        }  
        
        function allTable($id) {
            $query = $this->db->prepare('SELECT pedidos.Producto, pedidos.Fecha, pedidos.Especificaciones, pedidos.Estado,pedidos.Precio, usuarios.Nombre,
            usuarios.Apellido, usuarios.Ciudad, usuarios.Telefono
            FROM `pedidos`
            INNER JOIN usuarios ON pedidos.IDUsuario = usuarios.IDUsuario
            WHERE pedidos.IDPedido = ?');
            $query->execute([$id]); 
            $ListaT = $query->fetchAll(PDO::FETCH_OBJ);
            return $ListaT;
            
        }
        
        function getProductos() {
            $query = $this->db->prepare('SELECT * FROM pedidos');
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