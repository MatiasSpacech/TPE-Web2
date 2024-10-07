<?php

class ProductoView{


   public function VerProductos($productos){
    
    require 'templates/listar_productos.phtml';
       /* require_once 'templates/layout/header.phtml';
        echo "<ul>"; // Iniciar lista desordenada
        // Recorrer los resultados y generar la lista
        foreach ($productos as $producto) {
            echo '<li>';
            echo 'Nombre: ' . $producto->Nombre . '<br>';
            echo 'Descripción: ' . $producto->Descripcion . '<br>';
            echo 'Precio: $' . $producto->Precio;
            echo '</li>';
        }
        echo "</ul>";
        require_once 'templates/formulario_alta_producto.phtml';

        require_once 'templates/layout/footer.phtml';*/
    }
    public function mostrarError($error){
        echo  $error;
    }
    public function verDetalle($producto){
        require 'templates/detalle_producto.phtml';
    }

    public function VerFormularioNuevoProducto(){
        $model= new CategoriaModel();
        $categorias = $model->getCategorias();
        require 'templates/formulario_alta_producto.phtml';
    }

}