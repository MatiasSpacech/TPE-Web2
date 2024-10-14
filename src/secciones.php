<?php
function showProductos(){
    $db = new PDO('mysql:host=localhost;'.'dbname=tpeespecial;charset=utf8', 'root', '');
    $query = $db->prepare('SELECT * FROM productos');
        // $query = $db->prepare('SELECT nombre, descripcion, precio FROM productos');
        $query->execute();
        $productos = $query->fetchAll(PDO::FETCH_OBJ);

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
  }