<?php
session_start();
error_reporting(0);
include 'actions/conexion.php';
include 'actions/config.php';
$consulta = $pdo->prepare("SELECT * FROM productos WHERE oferta_producto = 1");
$consulta->execute();
$listaOfertas =  $consulta->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">

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
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/style.css">

    <title> - Inicio - </title>
</head>

<body>
    <div id="loader-container">
        <img src="imagenes/logo.png" height="120" alt="">
        <h1>Sunny <b>Day</b></h1>
    </div>
    <header>
        <?php include 'componentes/header.php'; ?>

    </header>

    <?php include 'componentes/usuario.php'; ?>
    <section>
        <article class="bg">
            <div class="slider-text">
                <p>Sunny Day</p>
            </div>
        </article>
        <article class="ofertas">
            <h2><span>Oferta Semanal</span></h2>
            <ul class="offers">
                <?php foreach ($listaOfertas as $ofertas) { ?>
                    <li>
                        <img src="imagenes/<?php echo $ofertas['foto_producto']; ?>" class="img" alt="">
                        <div class="caption">
                            <div class="blur"></div>
                            <div class="information">
                                <h1><?php echo $ofertas['nombre_producto']; ?></h1>
                                <p><?php echo $ofertas['descripcion_producto']; ?></p>
                                <div class="buttons">
                                    <form method="POST" action="publicacion.php">
                                        <input type="text" class="input-hidden" name="id" value="<?php echo $ofertas['id_producto']; ?>" />
                                        <button type="submit" class="button-offer"><i class="fas fa-arrows-alt"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </li>
                <?php } ?>
            </ul>

        </article>
    </section>
    <footer>
        <?php include 'componentes/footer.php'; ?>
    </footer>
    <script script src="https://unpkg.com/scrollreveal">
    </script>
    <script src="js/main.js" type="text/javascript">

    </script>
    <script src="js/menu-hamburguer.js"></script>
</body>

</html>