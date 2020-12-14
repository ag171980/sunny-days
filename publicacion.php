<?php
session_start();
error_reporting(0);
include 'actions/conexion.php';
include 'actions/config.php';
$id = $_POST['id'];
$consulta = $pdo->prepare("SELECT * FROM productos WHERE id_producto = '$id'");
$consulta->execute();
$publicacion = $consulta->fetchAll(PDO::FETCH_ASSOC);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="imagenes/logo.ico" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/5b23b3e9e6.js" crossorigin="anonymous"></script>
    <!--Para actualizar la pagina y que no guarde en cache-->
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/usuario.css">
    <link rel="stylesheet" href="css/publicacion.css">

    <title>- Publicacion -</title>
</head>

<body>

    <?php include 'componentes/usuario.php'; ?>
    <article class="container">
        <section>
            <?php foreach ($publicacion as $producto) { ?>
                <div class="left">
                    <div class="imagen">
                        <img src="imagenes/<?php echo $producto['foto_producto']; ?>" class="img" alt="Imagen del producto">
                    </div>
                </div>
                <div class="right">
                    <div class="information">
                        <h3><?php echo $producto['nombre_producto']; ?></h3>
                        <p> <b>$<?php echo $producto['precio_producto']; ?></b></p>
                        <p><b>Stock:</b> <?php echo $producto['stock_producto']; ?></p>
                        <h5 class="mb-0">Informacion sobre talles</h5>
                        <table>
                            <?php include 'componentes/table.php'; ?>
                        </table>
                    </div>
                    <div class="form-group">
                        <label for="talles"><b>Talles: </b></label>
                        <select class="select" id="talles">
                            <option value="35">35</option>
                            <option value="36">36</option>
                            <option value="37">37</option>
                            <option value="38">38</option>
                            <option value="39">39</option>
                        </select>
                    </div>
                    <?php if ($producto['stock_producto'] != 0) : ?>
                        <div class="buttons">
                            <?php if (!isset($_SESSION['email'])) : ?>
                                <div id="alerta">
                                </div>
                                <button class="button-shop" onclick="alert('Para poder añadir productos a su carrito debe iniciar sesion!',checkRed);"><i class="fas fa-shopping-cart"></i> Agregar al carrito</button>
                            <?php else : ?>
                                <form method="POST" action="carrito.php">
                                    <label for="cantidad">Cantidad: </label>
                                    <select class="form-control select" name="cantidad" id="cantidad">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                    <input type="text" class="input-hidden" name="id_producto" value="<?php echo $producto['id_producto']; ?>" />
                                    <div id="alerta">
                                    </div>
                                    <button type="submit" onclick="alert('Producto agregado con exito!',checkGreen);" class="button-shop"><i class="fas fa-shopping-cart"></i> Agregar al carrito</button>
                                </form>
                            <?php endif; ?>

                        </div>
                    <?php else : ?>
                        <div id="alerta">
                        </div>
                        <div class="buttons">
                            <button onclick="alert('Producto sin stock',checkRed);" class="button-shop"><i class="fas fa-shopping-cart"></i> Agregar al carrito</button>
                        <?php endif; ?>
                        </div>
                </div>
            <?php } ?>
        </section>
    </article>

    <script src="js/alert.js"></script>
</body>

</html>