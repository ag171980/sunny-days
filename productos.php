<?php
session_start();
error_reporting(0);
include 'actions/Conexion.php';
include 'actions/config.php';
$buscar = $_POST['palabra'];
$filtro = $_POST['select'];
$consultar = $pdo->prepare("SELECT * FROM productos WHERE nombre_producto LIKE '%$buscar%'");
$consultaOrden = $pdo->prepare("SELECT * FROM productos ORDER BY asc");
$consultar->execute();
$listaFiltro = $consultar->fetchAll(PDO::FETCH_ASSOC);
$cantidad = count($listaFiltro);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="imagenes/logo.ico" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/productos.css">
    <title> - Productos - </title>
</head>

<body>
    <header>
        <?php include 'componentes/header.php'; ?>
    </header>
    <div class="usuario">
        <?php if (!isset($_SESSION['email'])) : ?>
            <a href="login.php">Inicia sesion </a>
            <p>/</p><a href="registro.php">registrate</a>
        <?php else : ?>
            <p><?php echo 'Usuario: ' . $_SESSION['email']; ?><a href="actions/logout.php"> Salir</a></p>
        <?php endif; ?>
    </div>
    <article>
        <h1><span>Productos</span></h1>
        <form method="POST" class="formulario_buscador" role="search" action="productos.php">
            <div class=" btn-group">
                <input type="search" name="palabra" class="search_input" placeholder="Buscar.." value="<?php echo $buscar; ?>">
                <button type="submit" name="buscador" class="button" data-toggle="searchbar">
                    <i class="fa fa-search"></i>
                </button>
            </div>
            <div>

                <select name="select" id="select">
                    <option value="-">-</option>
                    <option value="A-Z">A-Z</option>
                    <option value="Z-A">Z-A</option>
                    <option value="Mayor precio">Mayor precio</option>
                    <option value="Menor precio">Menor precio</option>
                </select>
                
                <button type="submit" name="filtro" class="btn btn-primary">Filtrar</button>
            </div>
        </form>
        <?php
        if ($buscar == null || $filtro == null) {
            echo 'Resultados para: <b>' . $buscar . "</b> total: " . $cantidad . "<br/> ";
            echo ' Filtrado por: ' . $filtro . " .";
        } else {
            echo 'Resultados para: <b>' . $buscar . "</b> total: " . $cantidad . "<br/> ";
            echo ' Filtrado por: ' . $filtro . " .";
        }
        ?>
        <section>
            <div class="productos">
                <?php foreach ($listaFiltro as $filtro) { ?>
                    <div class="item" id="<?php echo $filtro['id_producto']; ?>">
                        <img src="imagenes/<?php echo $filtro['foto_producto']; ?>" class="img" alt="">
                        <h3 class="text-center"><?php echo $filtro['nombre_producto']; ?></h3>
                        <?php if ($filtro['stock_producto'] != 0) : ?>

                            <p>Hay Stock disponible!</p>
                            <div class="buttons">
                                <form method="POST" action="publicacion.php">
                                    <input type="text" class="input-hidden" name="id" value="<?php echo $filtro['id_producto']; ?>" />
                                    <button type="submit" class="btn btn-primary btn-lg"><i class="fas fa-arrows-alt"></i></button>
                                </form>
                                <form action="">
                                    <button class="btn btn-success btn-lg"><i class="fas fa-shopping-cart"></i></button>
                                </form>
                            </div>

                        <?php else : ?>

                            <p class="text-danger">No hay stock</p>
                            <div class="buttons">
                                <form method="POST" action="publicacion.php">
                                    <input type="text" class="input-hidden" name="id" value="<?php echo $filtro['id_producto']; ?>" />
                                    <button type="submit" class="btn btn-primary btn-lg"><i class="fas fa-arrows-alt"></i></button>
                                </form>
                                <form action="">
                                    <button class="btn btn-success btn-lg"><i class="fas fa-shopping-cart"></i></button>
                                </form>
                            </div>

                        <?php endif; ?>
                    </div>
                <?php } ?>
            </div>
        </section>
    </article>
    <footer>
        <?php include 'componentes/footer.php'; ?>
    </footer>
</body>

</html>