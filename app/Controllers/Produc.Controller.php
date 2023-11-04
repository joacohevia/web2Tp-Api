<?php
    include_once 'app/Model/Produc.Model.php';
    include_once 'app/Model/Categ.Model.php';
    include_once 'app/View/Produc.View.php';
    include_once './helpers/AuthHelpers.php';
    class ProducController {
        private $modelPro;
        private $viewPro;//esto declara que el controlador siempre va a usar model y view
        private $model;
        private $alertView;

        function __construct() {
            $this->modelPro = new ProducModel();//dentro de model crea..
            $this->viewPro = new ProducView();
            $this->model = new CategModel();
            $this->alertView = new AlertView();
        }
    
        function Lista() {
            $productos = $this->modelPro->ListProduc();
            // acutializar lista
            if ($productos != null) {
                $this->viewPro->MostrarProduc($productos, AuthHelper:: isAdmin());
            }else {
                $this->alertView->Error("No hay elementos");
            }
        }

        function ListaTotal($id) {
            if (ValidationHelper::verifyIdRouter($id)) {
                $list=$this->modelPro->ListaT($id);
                if ($list != null) {
                    $this->viewPro->MostrarLisT($list);
                } else {
                    $this->alertView->Error("No hay elementos");
                }
            } else {
                $this->alertView->Error("404-not-found");
            }
        }

        function formItems () {
            $categDisp = $this->model->CategDisp();//categorias disponibles
            $this->viewPro->MostrarForm($categDisp);
        }
        
        function insertItems() {
            try {//verifico parametros
                if ($_POST && ValidationHelper::verifyForm($_POST)) {
                    $IDCategoria =($_POST['IDCategoria']);
                    $Tipo =($_POST['Tipo']);
                    $Talle =($_POST['Talle']);
                    $Precio  =($_POST['Precio']);
                    $Color =($_POST['Color']);
                    $Stock =($_POST['Stock']);
    
                    $id = $this->modelPro->insertItem($IDCategoria, $Tipo, $Talle, $Precio, $Color, $Stock);
    
                    if ($id) {
                        header('Location: ' . BASE_URL . "listar");
                    } else {
                        $this->alertView->Error("Error al insertar la tarea");
                    }
                } else {
                    $this->alertView->Error("Complete todos los campos");
                }
            } catch (PDOException) {
                $this->alertView->Error("Error en la consulta a la base de datos");
            }
        }
        
        function formMod($id) {
            if (ValidationHelper::verifyIdRouter($id)) {
                $items = $this->modelPro->ListaT($id);//dados actuales
                if ($items != null) {
                    $categDisp = $this->model->CategDisp();//consulto las categorias disponibles 
                    $this->viewPro->FormModItems($categDisp, $items);
                } else {
                    $this->alertView->Error("error al mostrar formulario");
                }
            } else {
                $this->alertView->Error("404-Not-Found");
            }
        }

        function itemsMod() {
            try {//verifico parametros
                if ($_POST && ValidationHelper::verifyForm($_POST)) {
                    $IDProducto = ($_POST['IDProducto']);
                    $IDCategoria =($_POST['IDCategoria']);
                    $Tipo =($_POST['Tipo']);
                    $Talle =($_POST['Talle']);
                    $Precio  =($_POST['Precio']);
                    $Color =($_POST['Color']);
                    $Stock =($_POST['Stock']);
    
                    $modificado = $this->modelPro->ModItems($IDProducto,$IDCategoria, $Tipo, $Talle, $Precio, $Color, $Stock);
    
                    if ($modificado > 0) {
                        header('Location: ' . BASE_URL . "listar");
                    } else {
                        $this->alertView->Error("Error al modificar");
                    }
                } else {
                    $this->alertView->Error("Complete todos los campos");
                }
            } catch (PDOException) {
                $this->alertView->Error("Error en la consulta a la base de datos");
            }
        }
        function borrarItem($id) {
            if (ValidationHelper::verifyIdRouter($id)) {
                
                    $eliminado = $this->modelPro->borrarItem($id);
                    if ($eliminado > 0) {
                        header('Location: ' . BASE_URL . "listar");
                    } else {
                        $this->alertView->Error("error al eliminar");
                    }
            } else {
                $this->alertView->Error("404-Not-Found");
            }
        }
       
        function Error() {
            $this->alertView->Error('404-not-found');
        }
    }