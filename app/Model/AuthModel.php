<?php
require_once 'app/Model/model.php'; 

    class authModel extends Model {
    
        function getEmail($email) {
            $query = $this->db->prepare('SELECT * FROM usuarios WHERE Correo = ?');
            $query->execute([$email]);
            return $query->fetch(PDO::FETCH_OBJ);
            
        }
    }