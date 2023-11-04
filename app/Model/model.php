<?php
   abstract class Model{

    protected $db;

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=web2;charset=utf8', 'root','');

    }

}