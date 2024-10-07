<?php
require_once './app/models/producto.model.php';
require_once './app/views/producto.view.php';
class ProductoController{
    private $model;
    private $view;

    public function __construct(){
        $this->model = new ProductoModel();
        $this->view = new ProductoView();
    }

    public function mostrarProductos(){
        $productos = $this->model->getProductos();
        return $this->view->verProductos($productos);
    }

    public function detalleProducto($id){
        $producto = $this->model->getProducto($id);
        return $this->view->verDetalle($producto);

    }

    public function agregarProducto() {
        if (!isset($_POST['nombre']) || empty($_POST['nombre'])) {
            return $this->view->mostrarError('Falta completar el nombre');
        }
    
        if (!isset($_POST['categoria']) || empty($_POST['categoria'])) {
            return $this->view->mostrarError('Falta completar la categoria');
        }
    
        $nombre = $_POST['nombre'];
        $categoria = $_POST['categoria'];
        $precio = $_POST['precio'];
        $marca = $_POST['marca'];
        $descripcion = $_POST['descripcion'];
        $URL_imagen = $_POST['URL_imagen'];

    
        $id = $this->model->agregarProducto($nombre, $descripcion, $precio, $marca, $URL_imagen, $categoria);
    
        // redirijo al home (también podriamos usar un método de una vista para motrar un mensaje de éxito)
        header('Location: ' . BASE_URL);
    }
}
