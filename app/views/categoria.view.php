<?php
class CategoriaView{
    private $user=null;
    
    public function __construct($user) {
        $this->user = $user;
    }

    public function verCategorias($categorias,$productos){
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
    
}