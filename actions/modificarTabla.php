<?php
session_start();
$carrito = $_SESSION['carrito'];
$total=0;
$num=0;
for($i=0;$i<count($carrito);$i++){
    if($carrito[$i]['id_producto']==$_POST['id_producto']){
        $num = $i;
    }
}
$carrito[$num]['cantidad'] = $_POST['cantidad'];
for($i=0;$i<count($carrito);$i++){
$total = ($carrito[$i]['precio_producto']*$carrito[$i]['cantidad'])+$total;
}
$_SESSION['carrito'] = $carrito;
echo $total;
?>