<?php
    
    class UserModel {
        private $db;

        function __construct()
        {
            $this->db = new PDO('mysql:host=localhost;dbname=db_web2;charset=utf8', 'root', '');
        }

        function getEmail($email) {
            $query = $this->db->prepare('SELECT * FROM usuarios WHERE Correo = ?');
            $query->execute([$email]);
            return $query->fetch(PDO::FETCH_OBJ);

        }
    }