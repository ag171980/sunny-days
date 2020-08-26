<?php
session_start();
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="imagenes/logo.ico" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/scrollreveal"></script>
    <link rel="stylesheet" href="css/style.css">

    <title> - Inicio - </title>
</head>

<body>
    <div id="loader-container">
        <div class="loader"></div>
        <p id="numb">0%</p>
    </div>
    <header>
        <?php include 'componentes/header.php'; ?>

    </header>

    <?php include 'componentes/usuario.php'; ?>
    <section>
        <article class="bg">
            <div class="slider-text">
                <p class="text-light text-center">Sunny Day</p>
            </div>
        </article>
        <article class="ofertas">
            <h2><span>Oferta Semanal</span></h2>
            <div class="container-a1">
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
                                            <button type="submit" class="btn btn-primary"><i class="fas fa-eye"></i></button>
                                            <button class="btn btn-success"><i class="fas fa-shopping-cart"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </article>
    </section>
    <footer>
        <?php include 'componentes/footer.php'; ?>
    </footer>

    <script src="js/main.js" type="text/javascript">
    </script>
</body>

</html>