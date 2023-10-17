<?php
//tabla producto
require_once 'app/Model/model.php'; 

    class UserModel extends Model{
      

        function insertItem($categoria, $tipo, $talle, $precio, $color, $stock) {
            $query = $this->db->prepare('INSERT INTO productos (Categoria, Tipo, Talle, Precio, Color, Stock) VALUES (?,?,?,?,?,?)');

            $query->execute([$categoria, $tipo, $talle, $precio, $color, $stock]);
            return $this->db->lastInsertId();
        }

        function insertCategoria($nombre, $ciudad, $direccion, $fecha) {
            $query = $this->db->prepare('INSERT INTO pedidos (Nombre, Ciudad, Direccion, Fecha) VALUES (?,?,?,?)');
            $query->execute([$nombre,$ciudad,$direccion,$fecha]);
            return $this->db->lastInsertId();
        }
        
        
            
        
        /*function addOrders() {
            $query = $this->db->prepare('SELECT pedidos.EstadoPedido, pedidos.FechaEnvio, usuarios.*, productos.Especificaciones, productos.TipoProducto,productos.Cantidad, productos.Precio
            FROM `pedidos`
            INNER JOIN usuarios ON pedidos.IDUsuario = usuarios.IDUsuario
            INNER JOIN productos ON pedidos.IDProducto = productos.IDProducto
            WHERE pedidos.IDPedido = ?');
            $query->execute([$id]); // Usamos un array para pasar el parámetro
            $ListaT = $query->fetchAll(PDO::FETCH_OBJ);
            return $ListaT;
        }*/
    }