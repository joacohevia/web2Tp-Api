<?php
    require_once 'app/Model/Produc.Model.php';
    require_once 'app/View/Api.View.php';

    class ControllerProducApi {
        private $model;
        private $view;
        private $data;

        function __construct()
        {
            $this->model = new ProducModel();
            $this->view = new ApiView();
            $this->data = file_get_contents('php://input');//lee lo que ingrese el usuario
            //esto manda un arr
        }
        function getData() {//hace un json con los ingreso el usuario
            return json_decode($this->data);
        }

        function ListProduc($params = []){
            if (empty($params)) {
                if(isset($_GET['sort'])&&isset($_GET['order'])) {//recibir parametros
                    $sort=$_GET['sort'];//bajo a variable
                    $order=$_GET['order'];
                        switch($sort){//controlo los casos posibles
                            case 'precio':
                                $sort='Precio';
                            break;
                            case 'idproducto':
                                $sort='IDProducto';
                            break;
                            default:
                                $this->view->response('Registro '.$sort.' incorrecto', 404);
                            break;
                        }
                        if ($order!=='DESC') {
                            $order='ASC';
                        } 
                        else {
                            $order='DESC';
                        } 
                        $adicional ='ORDER BY '.$sort.' '.$order;
                        // *
                } else {
                    $adicional ='';
                }
            $lista= $this->model->ListProduc($adicional);
            $this->view->response($lista, 200);
            } 
            else if (isset($params)) {
                $id = $params[':ID'];//igual al router
                $producto = $this->model->ListaT($id);
                if(!empty($producto)) {
                    if(isset($params[':subrecurso'])) {
                        switch ($params[':subrecurso']) {
                            case 'tipo':
                                $this->view->response($producto->Tipo, 200);
                            break;
                            case 'talle':
                                $this->view->response($producto->Talle, 200);
                            break;
                            default:
                                $this->view->response(
                                'El producto no contiene '.$params[':subrecurso'].'.', 404);
                            break;
                        }
                    } 
                    else { 
                        $this->view->response($producto, 200);
                    }
                } 
                else {
                    $this->view->response(
                        'El producto con el id='.$params[':ID'].' no existe.'
                        , 404);
                }
            }
        }

        function BorrarItem($params = []) {
            if (!empty($params)){
                $id = $params[':ID'];
                $eliminado = $this->model->borrarItem($id);
                if ($eliminado) {
                    $this->view->response("Producto $id eliminado", 200);
                } else {
                    $this->view->response("No existe registro para el producto $id", 404);
                }
            }
        }
    
        function insertItem($params = []) {
            $body = $this->getData();//con esta funcion traigo los datos
            $idcategoria = $body->IDCategoria;
            $tipo = $body->Tipo;
            $talle = $body->Talle;
            $precio = $body->Precio;
            $color = $body->Color;
            $stock = $body->Stock;
            if((empty($tipo)) || (empty($talle)) || (empty($precio)) || (empty($color)) || (empty($stock)) ) {
                $this->view->response("Complete todos los datos", 400);
            }
            else {
                $insert = $this->model->insertItem($idcategoria, $tipo, $talle, $precio, $color, $stock);
                //es buena practica devolver el recurso creado
                $produc = $this->model->ListaT($insert);
                $this->view->response("Producto creado", 201);
            }
        }

        function ModItems ($params = []) {
            if (!empty($params[":ID"])) { 
            $id = $params [':ID'];
            $produc = $this->model->ListaT($id);
                if ($produc) {
                    $body = $this->getData();//con esta funcion traigo los datos
                    $idproducto = $body->IDProducto;
                    $idcategoria = $body->IDCategoria;
                    $tipo = $body->Tipo;
                    $talle = $body->Talle;
                    $precio = $body->Precio;
                    $color = $body->Color;
                    $stock = $body->Stock;
                    //valido??
                    if((empty($idproducto)) || (empty($idcategoria)) || (empty($tipo)) || (empty($talle)) 
                    || (empty($precio)) || (empty($color)) || (empty($stock)) ) {
                        $this->view->response("Error complete todos los campos", 400);
                    }
                    else {
                        $this->model->ModItems($idproducto,$idcategoria, $tipo, $talle, $precio, $color, $stock);
                        $this->view->response("Producto modificado", 200);
                    }
                }
                else {
                    $this->view->response("El producto con el .$id. no existe", 404);
                }
            }
        }

        function default ($params = []) {
            $this->view->response("Edpoint incorrecto", 404);
        }
}  
    
 