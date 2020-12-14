<?php
session_start();
$producto_borrar = $_POST['id_producto'];
foreach ($_SESSION['carrito'] as $indice => $producto) {
    if ($producto['id_producto'] == $producto_borrar) {
        unset($_SESSION['carrito'][$indice]);
        echo "<script> alert('Elemento eliminado')</script>";
    }
}
header("location: ../carrito.php");
