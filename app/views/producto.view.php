<?php

class ProductoView{
    private $user=null;
    public function __construct($user) {
        $this->user = $user;
    }


    public function VerProductos($productos,$categorias){ 
        require 'templates/listar_productos.phtml';      
    }
    public function mostrarError($error){
        echo  $error;
    }
    public function verDetalle($producto){
        require 'templates/detalle_producto.phtml';
    }
    public function verEdicionProducto($producto, $categorias){//????????????????????????????????????????????
        
        require 'templates/formulario_edicion_producto.phtml';
    }

    public function VerFormularioNuevoProducto($categorias){        
        require 'templates/formulario_alta_producto.phtml';
    }
    public function verPanelAdmin($productos,$categorias){
        require 'templates/panel_admin.phtml'; 
    }

}