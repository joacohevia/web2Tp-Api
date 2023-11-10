<?php
//tabla productos
require_once 'app/Model/model.php'; 
    class ProducModel extends Model{
        //private porque solo yo puedo acceder

        function ListProduc($adicional) {
            $query = $this->db->prepare("SELECT IDProducto, Tipo, Talle, Precio FROM productos $adicional;");
            $query->execute();
            $productos = $query->fetchAll(PDO::FETCH_OBJ);
            return $productos;//para que se pueda incluir 
        }
         
        
        function ListaT($id) {
            $query = $this->db->prepare('SELECT * FROM productos WHERE IDProducto = ?');
            $query->execute([$id]); 
            $list = $query->fetch(PDO::FETCH_OBJ);
            return $list;  
        }
        
        function insertItem($IDCategoria, $Tipo, $Talle, $Precio, $Color, $Stock) {
            $query = $this->db->prepare('INSERT INTO productos (IDCategoria,Tipo,Talle,Precio,Color,Stock) VALUES(?,?,?,?,?,?)');
            $query->execute([$IDCategoria, $Tipo, $Talle, $Precio, $Color, $Stock]);
            return $this->db->lastInsertId();
        }
        function ModItems($IDProducto,$IDCategoria, $Tipo, $Talle, $Precio, $Color, $Stock) {
            $query = $this->db->prepare('UPDATE productos SET IDCategoria=?,Tipo=?,Talle=?,Precio=?,Color=?,Stock=? WHERE IDProducto=?');
            $query->execute([$IDCategoria, $Tipo, $Talle, $Precio, $Color, $Stock, $IDProducto]);//el id producto es para saber cual
            return $query->rowCount();
        }

        function borrarItem($id) {
            $query = $this->db->prepare('DELETE FROM productos WHERE IDProducto= ?');
            $query->execute([$id]);
            return $query->rowCount();
        }
        
    }
        /*public function getList($params = []){//GET 
                        if (empty($params)) {
                            if(isset($_GET['sort'])&&isset($_GET['order'])){//recibir parametros
                                $sort=$_GET['sort'];//bajo a variable
                                $order=$_GET['order'];
                                switch($sort){//controlo los casos posibles
                                    case 'precio':
                                        $sort='precio';
                                        break;
                                    case 'idCodigoProducto':
                                        $so 
                                        
                             public function getList($adicional){ 
                        
                        $query = $this->db->prepare("SELECT repuestos.*, categoria.categoria FROM repuestos JOIN categoria ON repuestos.idCategoria = categoria.idCategoria $adicional;");
                        $query = $this->db->prepare("SELECT productos.)
                        $query->execute();
                        return $query->fetchAll(PDO::FETCH_OBJ);
                    }
                        localhost/Web2/api/list?sort=nombre&order=ASC
                           */