<?php
class CategoriaView{
    private $user=null;
    public function __construct($user) {
        $this->user = $user;
    }

   public function verCategorias($categorias){
    $model= new ProductoModel();
    $productos = $model->getProductos();
    require_once 'templates/listar_categorias.phtml';
       
    }
    public function VerProductos($productos, $nombreCategoria){                 
        require_once 'templates/listar_productos_categoria.phtml';      
    }
    
    public function VerFormularioNuevoCategoria(){
        require_once 'templates/formulario_alta_categoria.phtml';

    }
    public function mostrarError($error){
        echo  $error;
    }
    public function verEdicionCategoria($categoria){
        require_once 'templates/formulario_edicion_categoria.phtml';
    }
    /*public function verProdcuctosPorCategoria($categoria,$productos){
        //require 'templates/detalle_producto.phtml';
    }
*/
}