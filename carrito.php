<?php
session_start();
include 'actions/conexion.php';
include 'actions/config.php';
error_reporting(0);
$id_producto = $_POST['id_producto'];
$cantidad = $_POST['cantidad'];

if (isset($_SESSION['carrito'])) {
    $arreglo = $_SESSION['carrito'];
    $encontro = false;
    $numero = 0;
    for ($i = 0; $i < count($arreglo); $i++) {
        if ($arreglo[$i]['id_producto'] == $id_producto) {
            $encontro = true;
            $numero = $i;
        }
    }
    if ($encontro) {
        $arreglo[$numero]['cantidad'] = $arreglo[$numero]['cantidad'] + 1;
        $_SESSION['carrito'] = $arreglo;
    } else {
        $nombre = '';
        $precio = 0;
        $imagen = '';
        $consulta = $pdo->prepare("SELECT * FROM productos WHERE id_producto = '$id_producto'");
        $consulta->execute();
        $lista_productos = $consulta->fetchAll(PDO::FETCH_ASSOC);
        foreach ($lista_productos as $prod) {
            $nombre = $prod['nombre_producto'];
            $precio = $prod['precio_producto'];
            $imagen = $prod['foto_producto'];
        }
        $datosNuevos = array(
            'id_producto' => $id_producto,
            'nombre_producto' => $nombre,
            'precio_producto' => $precio,
            'foto_producto' => $imagen,
            'cantidad' => $cantidad
        );
        array_push($arreglo, $datosNuevos);
        $_SESSION['carrito'] = $arreglo;
    }
} else {
    if (isset($id_producto)) {
        $nombre = '';
        $precio = 0;
        $imagen = '';
        $consulta = $pdo->prepare("SELECT * FROM productos WHERE id_producto = '$id_producto'");
        $consulta->execute();
        $lista_productos = $consulta->fetchAll(PDO::FETCH_ASSOC);
        foreach ($lista_productos as $prod) {
            $nombre = $prod['nombre_producto'];
            $precio = $prod['precio_producto'];
            $imagen = $prod['foto_producto'];
        }
        $array[] = array(
            'id_producto' => $id_producto,
            'nombre_producto' => $nombre,
            'precio_producto' => $precio,
            'foto_producto' => $imagen,
            'cantidad' => $cantidad
        );
        $_SESSION['carrito'] = $array;
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="imagenes/logo.ico" />
    <!--Para actualizar la pagina y que no guarde en cache-->
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/5b23b3e9e6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/usuario.css">
    <link rel="stylesheet" href="css/carrito.css">
    <link rel="stylesheet" href="css/footer.css">
    <title> - Carrito - </title>
</head>

<body>
    <header>
        <?php include 'componentes/header.php'; ?>
    </header>
    <?php include 'componentes/usuario.php'; ?>
    <article>
        <?php if (isset($_SESSION['email'])) { ?>
            <section class="item">
                <?php if (isset($_SESSION['carrito'])) {
                    $total = 0;
                    $datos = $_SESSION['carrito'];
                    for ($i = 0; $i < count($datos); $i++) {
                        if ($datos[$i]['id_producto'] != null) {
                ?>
                            <div class="container">
                                <div class="header-card">
                                    <form method="POST" action="actions/BorrarProducto.php">
                                        <input type="text" name="id_producto" class="input-hidden" value="<?php echo $datos[$i]['id_producto']; ?>" />
                                        <button type="submit" class="button-cancel"><i class="fas fa-times"></i></button>
                                    </form>
                                </div>
                                <div class="producto">
                                    <div class="box">
                                        <div class="imagen">
                                            <img src="imagenes/<?php echo $datos[$i]['foto_producto']; ?>" height="60" alt="">
                                        </div>
                                        <div class="informacion">
                                            <div class="contenido">
                                                <div class="titulo">
                                                    <h3><?php echo $datos[$i]['nombre_producto']; ?></h3>
                                                </div>
                                                <div class="precio">
                                                    <p>Precio por unidad: </p>
                                                    <h4>$<?php echo $datos[$i]['precio_producto']; ?></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box">
                                        <div class="datos">
                                            <label for="cantidad">Cantidad:<input type="text" id="cantidad" name="cantidad" class="cantidad" value="<?php echo $datos[$i]['cantidad']; ?>" data-precio="<?php echo $datos[$i]['precio_producto'] ?>" data-id="<?php echo $datos[$i]['id_producto']; ?>" /></label>
                                            <h4 class="subtotal">Subtotal: $<?php echo $datos[$i]['precio_producto'] * $datos[$i]['cantidad']; ?><input class="input-hidden" type="text" value="<?php echo $datos[$i]['precio_producto'] * $datos[$i]['cantidad']; ?>"></h4>
                                        </div>
                                    </div>
                                    <input class="input-hidden" type="text" value="<?php echo $total; ?>">
                                </div>
                            </div>
                        <?php
                            $total = ($datos[$i]['precio_producto'] * $datos[$i]['cantidad']) + $total;
                        } else { ?>
                            <div class="alert alert-success m-3"> 😟 No haya nada en tu carrito 😟</div>
                    <?php }
                    } ?>
                    </div>
                    <div class="container">
                        <div class="total">
                            <div class="precio">
                                <h3 id="total">Total: $<?php echo $total; ?></h3>
                            </div>
                            <div class="pagar">
                                <?php if ($total == 0) { ?>
                                    <button type="submit" class="btn btn-success disabled btn-lg"><i class="fas fa-wallet"></i> Pagar</button>
                                <?php } else { ?>
                                    <form action="pagar.php" method="POST">
                                        <input class="input-hidden" name="nombre" type="text" value="<?php echo $datos[$i]['nombre_producto']; ?>">
                                        <input class="input-hidden" type="text" value="<?php echo $datos[$i]['precio_producto']; ?>">
                                        <button type="submit" class="button-shop"><i class="fas fa-wallet"></i> Pagar</button>
                                    </form>

                                <?php } ?>
                                <a href="productos.php" class="btn btn-primary btn-lg"> Seguir comprando</a>
                            </div>
                        </div>
                        <div class="condiciones">
                            <p class="text-center">**Este es el precio final, no se te cobrará nada extra. Tanto el IVA como todo impuesto se encuentra incluido en este precio.**</p>
                        </div>
                    </div>
                <?php } ?>
            </section>
        <?php } else { ?>
            <section class="login">
                <img class="svg" src="imagenes/account.svg" alt="">
                <p>No hay nada en su carrito porque debes <a href="login.php">iniciar sesion</a> o <a href="registro.php">registrate</a></p>
            </section>
        <?php } ?>
    </article>
    <footer>
        <?php include 'componentes/footer.php'; ?>
    </footer>
    <script src="js/carrito.js"></script>
    <script src="js/menu-hamburguer.js"></script>
</body>

</html>