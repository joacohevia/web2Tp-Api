<?php
require_once 'app/Model/Categ.Model.php';
require_once 'app/View/Api.View.php';
class ControllerCategApi {
    private $model;
    private $view;
    private $data;
    

    function __construct() {
        $this->model = new CategModel();
        $this->view = new ApiView();
        $this->data = file_get_contents('php://input');//lee lo que ingrese el usuario
            //esto manda un arr
    }
    function getData() {//hace un json con los ingreso el usuario
        return json_decode($this->data);
    }

    function ListCateg ($params = []) {
        if(empty($params)) {
            $categorias = $this->model->ListCateg();
            $this->view->response($categorias, 200);
        } else if (isset($params)) {
            //si esta seteado
            $id = $params[':ID'];//como en el router
            $categoria = $this->model->BuscarItemsCateg($id);
            if ($categoria) {
                $this->view->response($categoria, 200);
            }else {
                $this->view->response("La categoria $id no tiene items asociados o no existe", 404);
            }
        }
    }

    function BorrarCateg($params = []){
        if(!empty($params)){
            try {
                $id = $params[':ID'];
                $eliminada = $this->model->borrarCateg($id);
    
                if($eliminada) {
                    $this->view->response("Categoria $id eliminada", 200);
                }
                else {
                    $this->view->response("No existe registro para la categoria $id", 404);
                }

            } catch(PDOException){
                $this->view->response("La categoria $id tiene producto/s asociado/s");
            }
        }//agrego alos otros??
    }

    function insertCateg($params = []) {
       $body = $this->getData();
       $categoria = $body->Categoria;
       $descripcion = $body->Descripcion;
       $marca = $body->Marca;
       $material = $body->Material;
       if((empty($categoria)) || (empty($descripcion)) || (empty($marca)) || (empty($material))) {
        $this->view->response("Error, complete todos los campos", 400);
        } else {
            $insert = $this->model->insertCateg($categoria,$descripcion,$marca,$material);
            if($insert) {
                $this->model->ListCateg($insert);
                $this->view->response("Categoria creada", 201);
            } else {
                $this->view->response("No se pudo crear categoria", 400);
            }//esta bien q agrege con el id?
        }
    }

    function ModCateg($params = []) {
        if (!empty($params)) {
            $id = $params [":ID"];
            $categoria = $this->model->ListCateg($id);

            if ($categoria) {
                $body = $this->getData();
                $idcategoria = $body->IDCategoria;
                $descripcion = $body->Descripcion;
                $marca = $body->Marca;
                $material = $body->Material;
                if((empty($categoria)) || (empty($descripcion)) || (empty($marca)) || (empty($material))) {
                    $this->view->response("Error, complete todos los campos", 400);
                } else {
                    $this->model->ModCateg($idcategoria,$descripcion,$marca,$material);
                    $this->view->response("Categoria modificada", 200);
                }
            } else {
                $this->view->response("La categoria con $id no existe", 404);
            }
        }    
    }
}
