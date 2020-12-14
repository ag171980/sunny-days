<?php
session_start();
include 'actions/conexion.php';
include 'actions/config.php';
error_reporting(0);
$buscar = $_POST['palabra'];
$filtro = $_POST['select'];
$correo = $_SESSION['email'];

$id_usuario = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email ='$correo'");
$id_usuario->execute();
$usuario = $id_usuario->fetchAll(PDO::FETCH_ASSOC);

$consultar = $pdo->prepare("SELECT * FROM productos WHERE nombre_producto LIKE '%$buscar%'");
$consultar->execute();


$listaFiltro = $consultar->fetchAll(PDO::FETCH_ASSOC);

function array_sort_by(&$arrIni, $col, $order)
{
    $arrAux = array();
    foreach ($arrIni as $key => $row) {
        $arrAux[$key] = is_object($row) ? $arrAux[$key] = $row->$col : $row[$col];
        $arrAux[$key] = strtolower($arrAux[$key]);
    }
    array_multisort($arrAux, $order, $arrIni);
}
function storey_sort($building_a, $building_b)
{
    return $building_b["precio_producto"] - $building_a["precio_producto"];
}

if ($filtro == "A-Z") {
    //$order = SORT_ASC


    array_sort_by($listaFiltro, 'nombre_producto', $order = SORT_ASC);
} else if ($filtro == 'Z-A') {


    array_sort_by($listaFiltro, 'nombre_producto', $order = SORT_DESC);
} else if ($filtro == "Mayor precio") {
    usort($listaFiltro, "storey_sort");
} else if ($filtro == "Menor precio") {
    array_sort_by($listaFiltro, 'precio_producto', $order = SORT_NUMERIC);
}


$cantidad = count($listaFiltro);
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
    <!--Stylesheet -->
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/usuario.css">
    <link rel="stylesheet" href="css/productos.css">
    <link rel="stylesheet" href="css/footer.css">
    <title> - Productos - </title>
</head>

<body>
    <header>
        <?php include 'componentes/header.php'; ?>
    </header>
    <?php include 'componentes/usuario.php'; ?>
    <article>
        <section>
            <?php //foreach($usuario as $user){echo $user['id_usuario'];} 
            ?>
            <h1><span>Productos</span></h1>
            <form method="POST" class="formulario_buscador" role="search" action="productos.php">
                <div class="btn-group">
                    <input type="search" name="palabra" class="search_input" placeholder="Buscar..." value="<?php echo $buscar; ?>">
                    <button type="submit" name="buscador" class="button" data-toggle="searchbar">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
                <div class="btn-group">
                    <select name="select" class="select_input" id="select">
                        <option value="-">-</option>
                        <option value="A-Z">A-Z</option>
                        <option value="Z-A">Z-A</option>
                        <option value="Mayor precio">Mayor precio</option>
                        <option value="Menor precio">Menor precio</option>
                    </select>

                    <button type="submit" name="filtro" class="button_input"><i class="fas fa-filter"></i></button>
                </div>
            </form>
            <?php
            if ($buscar == null || $filtro == null) {
                echo '<div class="d-flex flex-row justify-content-around">
                <p>Resultados para: <b>' . $buscar . '</b>. Total: ' . $cantidad . '</p>
                <p>Filtrado por: <b>' . $filtro . '</b>.</p>
                
                </div>';
            } else {
                echo '<div class="d-flex flex-row justify-content-around">
                <p>Resultados para: <b>' . $buscar . '</b>. Total: ' . $cantidad . '</p>
                <p>Filtrado por: <b>' . $filtro . '</b>.</p>
                
                </div>';
            }
            ?>
        </section>
        <section class="productos">
            <?php foreach ($listaFiltro as $filtro) { ?>
                <div class="item" id="<?php echo $filtro['id_producto']; ?>">
                    <div class="imagen">
                        <img src="imagenes/<?php echo $filtro['foto_producto'] ?>" class="img" alt="">
                    </div>
                    <div class="informacion">
                        <div class="head-card">
                            <div class="h-cinco">
                                <h5><?php echo $filtro['nombre_producto']; ?></h5>
                            </div>
                            <div class="p-cinco">
                                <p>$<?php echo $filtro['precio_producto']; ?></p>
                            </div>
                        </div>
                        <?php if ($filtro['stock_producto'] != 0) : ?>
                            <p class="stock">¡Hay Stock disponible!</p>
                            <?php if ($filtro['oferta_producto'] == 1) : ?>
                                <p class="oferta">¡En oferta!</p>
                            <?php else : ?>
                            <?php endif; ?>
                            <div class="buttons">
                                <form method="POST" action="publicacion.php">
                                    <input type="text" class="input-hidden" name="id" value="<?php echo $filtro['id_producto']; ?>" />
                                    <button type="submit" class=" btn button-card view"><i class="fas fa-arrows-alt"></i></button>
                                </form>
                            </div>
                        <?php else : ?>
                            <p class="no-stock">No hay stock</p>
                            <div class="buttons">
                                <form method="POST" action="publicacion.php">
                                    <input type="text" class="input-hidden" name="id" value="<?php echo $filtro['id_producto']; ?>" />
                                    <button type="submit" class=" button-card view"><i class="fas fa-arrows-alt"></i></button>
                                </form>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
            <?php } ?>
        </section>
    </article>
    <footer>
        <?php include 'componentes/footer.php'; ?>

    </footer>
    <script src="js/menu-hamburguer.js"></script>
</body>

</html>