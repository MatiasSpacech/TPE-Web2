
<?php
include_once "app/controllers/producto.controller.php";
include_once "app/controllers/categoria.controller.php";
include_once "app/views/producto.view.php";

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');
if (!empty($_GET["action"])){
    $action = $_GET["action"];
}
else{
    $action= "productos";
}

$params= explode('/', $action);

switch ($params[0]) {
    case 'productos':
        $controller = new ProductoController();
        if (isset($params[1]))
            $controller->detalleProducto($params[1]);
        else 
            $controller->mostrarProductos();        
        break;
    case 'nuevo':        
        $controller = new ProductoController();
        $controller->agregarProducto();    
        break;
    case 'categorias':
        $controller = new CategoriaController();
        if (isset($params[1]))
            $controller->mostrarProductosPorCategoria($params[1]);
        else
            $controller->mostrarCategorias();
        break;
    case 'formularioNuevoProducto':
        $view = new ProductoView();
        $view->VerFormularioNuevoProducto();
        break;
    
    default:
        # code...
        break;
}
  
  
