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
        $categorias = $this->model->getCategorias();
        $productos = $this->model->getProductosXCategoria($nombreCategoria);
      //  $viewProducto = new ProductoView();       
        
        return $this->view->VerProductos($productos,$nombreCategoria);
        

    }

    public function nuevaCategoria(){
        return $this->view->VerFormularioNuevoCategoria();
    }
        

    public function agregarCategoria(){
        if (!isset($_POST['nombre']) || empty($_POST['nombre'])) {
            return $this->view->mostrarError('Falta completar el nombre');
        }           
        if (!isset($_POST['descripcion']) || empty($_POST['descripcion'])) {
            return $this->view->mostrarError('Falta completar la descripcion');
        }
        if (!isset($_POST['URL_imagen']) || empty($_POST['URL_imagen'])) {
            return $this->view->mostrarError('Falta completar la URL de la imagen');
        }
    
        $nombre = $_POST['nombre'];        
        $descripcion = $_POST['descripcion'];
        $URL_imagen = $_POST['URL_imagen'];

    
        $id = $this->model->agregarCategoria($nombre, $descripcion, $URL_imagen);
    
        // redirijo al home (también podriamos usar un método de una vista para motrar un mensaje de éxito)
        header('Location: ' . BASE_URL);
    }
    public function formCategoria($id){
        $categoria = $this->model->getCategoria($id);
        return $this->view->verEdicionCategoria($categoria);
    }
    public function updateCategoria($id){ 
        if (!isset($_POST['nombre']) || empty($_POST['nombre'])) {
            return $this->view->mostrarError('Falta completar el nombre');        }
    
        
        if (!isset($_POST['descripcion']) || empty($_POST['descripcion'])) {
            return $this->view->mostrarError('Falta completar la descripcion');
        }
        if (!isset($_POST['URL_imagen']) || empty($_POST['URL_imagen'])) {
            return $this->view->mostrarError('Falta completar la URL de la imagen');
        }       
        $nombre = $_POST['nombre'];        
        $descripcion = $_POST['descripcion'];
        $URL_imagen = $_POST['URL_imagen'];
        //verificar que exista producto
        if($this->model->getCategoria($id)){
            $this->model->editarCategoria($nombre, $URL_imagen, $categoria, $id);
        }
        else 
        return $this->view->mostrarError('No existe el producto');
        header('Location: ' . BASE_URL);

    }
    public function deleteProducto($id){
        if($this->modelProducto->getProducto($id)){
            $this->modelProducto->borrarProducto($id);
        }
        header('Location: ' . BASE_URL . '/admin');

    }

}