<?php
//tabla producto
require_once 'app/Model/model.php'; 

    class CategModel extends Model{
        
        function ListCateg() {
            $query = $this->db->prepare('SELECT * FROM categorias');
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);
        }
        function BuscarItemsCateg($id){
            $query = $this->db->prepare('SELECT productos.*, categorias.Categoria FROM productos JOIN categorias ON productos.IDCategoria = categorias.IDCategoria WHERE productos.IDCategoria=?');
            $query->execute([$id]);
            return $query->fetchAll(PDO::FETCH_OBJ);
        }

        function CategDisp() {
            $query = $this->db->prepare('SELECT categorias.IDCategoria,categorias.Categoria FROM categorias;');
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);
        }
       
        function insertCateg($Categoria,$Descripcion,$Marca,$Material) {
            $query = $this->db->prepare('INSERT INTO categorias (Categoria,Descripcion,Marca,Material) VALUES (?,?,?,?)');
            $query->execute([$Categoria,$Descripcion,$Marca,$Material]);
            return $this->db->lastInsertId();
        }
        function borrarCateg($id) {
            $query = $this->db->prepare('DELETE FROM categorias WHERE IDCategoria = ?');
            $query->execute([$id]);
            return $query->rowCount();
        }
        function ModCateg($IDCategoria,$Descripcion,$Marca,$Material){
            $query = $this->db->prepare('UPDATE categorias SET Descripcion=?,Marca=?,Material=? WHERE IDCategoria=?');
            $query->execute([$Descripcion,$Marca,$Material,$IDCategoria]);
            return $query->rowCount();
        }
    }