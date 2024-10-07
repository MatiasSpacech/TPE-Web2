<?php
class CategoriaView{


   public function verCategorias($categorias){
    require 'templates/listar_categorias.phtml';
       
    }
    public function mostrarError($error){
        echo  $error;
    }
    public function verProdcuctosPorCategoria($categoria,$productos){
        //require 'templates/detalle_producto.phtml';
    }

}