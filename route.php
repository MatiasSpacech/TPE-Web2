
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
    case 'admin':
        $controller = new ProductoController();
        $controller->mostrarAdmin(); 
        break;
    case 'formEditarProducto':        
        $controller = new ProductoController();
        if (isset($params[1]))
            $controller->formProducto($params[1]);         
        break;
    case 'editar':        
            $controller = new ProductoController();
            if (isset($params[1]))
                $controller->updateProducto($params[1]);         
            break;    
    case 'formProducto':
        $controller = new ProductoController();
        $controller->nuevoProducto();
        break;
    case 'eliminarProducto':
        $controller = new ProductoController();
            if (isset($params[1]))
                $controller->deleteProducto($params[1]);         
            break;
    case 'categorias':
        $controller = new CategoriaController();
        if (isset($params[1]))
            $controller->mostrarProductosPorCategoria($params[1]);
        else
            $controller->mostrarCategorias();
        break;
    case 'formCategoria':
        $controller = new CategoriaController();
        $controller->nuevaCategoria();
        break;

    case 'nuevaCategoria':
        $controller = new CategoriaController();
        $controller->agregarCategoria();
        break;
    case 'formEditarCategoria':        
        $controller = new CategoriaController();
        if (isset($params[1]))
            $controller->formCategoria($params[1]);         
        break;
    case 'editarCategoria':        
        $controller = new CategoriaController();
        if (isset($params[1]))
          $controller->updateCategoria($params[1]);         
        break;    


    
    
    default:
        # code...
        break;
}
  
  
