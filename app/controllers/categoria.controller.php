<?php
require_once './app/models/categoria.model.php';
require_once './app/views/categoria.view.php';
class CategoriaController{
    private $model;
    private $view;

    public function __construct(){
        $this->model = new CategoriaModel();
        $this->view = new CategoriaView();
    }
    public function mostrarCategorias(){
        $categorias = $this->model->getCategorias();
        return $this->view->verCategorias($categorias);
    }
    public function mostrarProductosPorCategoria($nombreCategoria){
        
        $productos = $this->model->getProductosXCategoria($nombreCategoria);
        $viewProducto = new ProductoView();       
        
        return $viewProducto->VerProductos($productos);
        

    }

}