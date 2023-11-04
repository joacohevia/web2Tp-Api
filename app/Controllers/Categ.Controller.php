<?php
     include_once 'app/Model/Categ.Model.php';
     include_once 'app/View/Categ.View.php';
     include_once 'app/View/AlertView.php';
     include_once './helpers/validation.helper.php';
    
    class CategController {
        private $view;
        private $model;
        private $alertView;

        function __construct()
        {
            $this->view = new CategView();
            $this->model = new CategModel();
            $this->alertView =  new AlertView();
        }

        function Categorias() {
        $categorias = $this->model->ListCateg();
        if ($categorias != null) {
            $this->view->MostrarCateg($categorias, AuthHelper::isAdmin());
        } else {
            $this->alertView->Error("no hay elementos");
        }
        }

        function CategId($id) {
            if (ValidationHelper::verifyIdRouter($id)) { //validacion datos recibidos del router
                $categId = $this->model->BuscarItemsCateg($id);//selecciona los items relacionados y la categoria asociada segun parametro
                if ($categId != null) {
                    $this->view->MostrarItemsCateg($categId);
                } else {
                    $this->alertView->Error("la categoria seleccionada no contiene items asociados");
                }
            } else {
                $this->alertView->Error("404-Not-Found");
            }
        }

        function formCateg() {//solo muestra el form
            $this->view->formCateg();
        }

        function insertCateg() {
            try {
                if ($_POST && ValidationHelper::verifyForm($_POST)){
                    $Categoria = ($_POST['Categoria']);
                    $Descripcion = ($_POST['Descripcion']);
                    $Marca = ($_POST['Marca']);
                    $Material = ($_POST['Material']);
                    $insert = $this->model->insertCateg($Categoria,$Descripcion,$Marca,$Material);
                    if($insert) {
                        header('Location: '. BASE_URL . "categorias");
                    }
                    else {
                        $this->alertView->Error('No se pudo insertar categoria');
                    }
                }
                else {
                    $this->alertView->Error("Complete todos los campos");
                }
            }catch (PDOException) {
                $this->alertView->Error("Error en la base de datos");
            }
        }
      
        function borrarCateg($id) {
            if (ValidationHelper::verifyIdRouter($id)) {
                try { 
                    $eliminado = $this->model->borrarCateg($id);
                    if($eliminado) {
                        header('Location: '. BASE_URL. "categorias");
                    }
                    else {
                        $this->alertView->Error("No se pudo eliminar categoria");
                    }
                } catch(PDOException) {
                    $this->alertView->Error("La categoria tiene producto/s asociado/s");
                }
            } else {
                $this->alertView->Error("404-not-found");
            }    
        }

        function ModCateg($id) {
            if (ValidationHelper::verifyIdRouter($id)){
                $categoria = $this->model->ListCateg($id);
                if ($categoria != null){
                    $this->view->formModCateg($categoria);
                } else {
                    $this->alertView->Error("Error al mostrar formulario");
                }
            }else {
                $this->alertView->Error("404-not-found");
            }
        }

        function CategMod() {
            try {
                if ($_POST && ValidationHelper::verifyForm($_POST)) {
                    $IDCategoria = ($_POST['IDCategoria']);
                    $Descripcion = ($_POST['Descripcion']);
                    $Marca = ($_POST['Marca']);
                    $Material = ($_POST['Material']);

                    $modificada = $this->model->ModCateg($IDCategoria,$Descripcion,$Marca,$Material);
                    if ($modificada > 0) {
                        header('Location: '. BASE_URL . "categorias");
                    }
                    else {
                        $this->alertView->Error("Error al modificar categoria");
                    }
                } else {
                    $this->alertView->Error("Complete el formulario");
                }
            } catch (PDOException) {
                $this->alertView->Error("Error en la consulta a la base de datoss");
            }
        }
    }