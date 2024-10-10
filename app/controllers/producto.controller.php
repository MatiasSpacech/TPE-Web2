<?php
include_once './app/models/producto.model.php';
include_once './app/views/producto.view.php';
include_once './app/models/categoria.model.php';

class ProductoController{
    private $modelProducto;
    private $view;
    private $modelCategoria;

    public function __construct(){
        $this->modelProducto = new ProductoModel();
        $this->view = new ProductoView();
        $this->modelCategoria = new CategoriaModel();
    }

    public function mostrarProductos(){
        $productos = $this->modelProducto->getProductos();
        $categorias = $this->modelCategoria->getCategorias();
        return $this->view->verProductos($productos, $categorias);

    }

    public function detalleProducto($id){
        $producto = $this->modelProducto->getProducto($id);
        return $this->view->verDetalle($producto);

    }

    public function formProducto($id){
        $producto = $this->modelProducto->getProducto($id);
        $categorias = $this->modelCategoria->getCategorias();

        return $this->view->verEdicionProducto($producto, $categorias);
    }
    public function nuevoProducto(){
        $categorias = $this->modelCategoria->getCategorias();
        return $this->view->VerFormularioNuevoProducto($categorias);
    }

    public function agregarProducto() {
        if (!isset($_POST['nombre']) || empty($_POST['nombre'])) {
            return $this->view->mostrarError('Falta completar el nombre');
        }
    
        if (!isset($_POST['categoria']) || empty($_POST['categoria'])) {
            return $this->view->mostrarError('Falta completar la categoria');
        }
        if (!isset($_POST['precio']) || empty($_POST['precio'])) {
            return $this->view->mostrarError('Falta completar el precio');
        }
        if (!isset($_POST['marca']) || empty($_POST['marca'])) {
            return $this->view->mostrarError('Falta completar la marca');
        }
        if (!isset($_POST['descripcion']) || empty($_POST['descripcion'])) {
            return $this->view->mostrarError('Falta completar la descripcion');
        }
        if (!isset($_POST['URL_imagen']) || empty($_POST['URL_imagen'])) {
            return $this->view->mostrarError('Falta completar la URL de la imagen');
        }
    
        $nombre = $_POST['nombre'];
        $categoria = $_POST['categoria'];
        $precio = $_POST['precio'];
        $marca = $_POST['marca'];
        $descripcion = $_POST['descripcion'];
        $URL_imagen = $_POST['URL_imagen'];

    
        $id = $this->modelProducto->agregarProducto($nombre, $descripcion, $precio, $marca, $URL_imagen, $categoria);
    
        // redirijo al home (también podriamos usar un método de una vista para motrar un mensaje de éxito)
        header('Location: ' . BASE_URL);
    }
    public function mostrarAdmin(){
        $productos = $this->modelProducto->getProductos();
        $categorias = $this->modelCategoria->getCategorias();
        return $this->view->verPanelAdmin($productos,$categorias);

    }


    public function updateProducto($id){ 
        if (!isset($_POST['nombre']) || empty($_POST['nombre'])) {
            return $this->view->mostrarError('Falta completar el nombre');        }
    
        if (!isset($_POST['categoria']) || empty($_POST['categoria'])) {
            return $this->view->mostrarError('Falta completar la categoria');
        }
        if (!isset($_POST['precio']) || empty($_POST['precio'])) {
            return $this->view->mostrarError('Falta completar el precio');
        }
        if (!isset($_POST['marca']) || empty($_POST['marca'])) {
            return $this->view->mostrarError('Falta completar la marca');
        }
        if (!isset($_POST['descripcion']) || empty($_POST['descripcion'])) {
            return $this->view->mostrarError('Falta completar la descripcion');
        }
        if (!isset($_POST['URL_imagen']) || empty($_POST['URL_imagen'])) {
            return $this->view->mostrarError('Falta completar la URL de la imagen');
        }       
        $nombre = $_POST['nombre'];
        $categoria = $_POST['categoria'];
        $precio = $_POST['precio'];
        $marca = $_POST['marca'];
        $descripcion = $_POST['descripcion'];
        $URL_imagen = $_POST['URL_imagen'];
        //verificar que exista producto
        if($this->modelProducto->getProducto($id)){
            $this->modelProducto->editarProducto($nombre, $descripcion, $precio, $marca, $URL_imagen, $categoria, $id);
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
