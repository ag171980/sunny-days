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
function storey_sort($building_a, $building_b) {
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
    <?php include 'componentes/usuario.php'; ?>
    <article>
        <section>
            <?php //foreach($usuario as $user){
            // echo $user['id_usuario'];
            echo $valor;
            //} 
            ?>
            <h1><span>Productos</span></h1>
            <form method="POST" class="formulario_buscador" role="search" action="productos.php">
                <div class=" btn-group">
                    <input type="search" name="palabra" class="search_input" placeholder="Buscar..." value="<?php echo $buscar; ?>">
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
                            <p>¡Hay Stock disponible!</p>
                            <div class="buttons">
                                <form method="POST" action="publicacion.php">
                                    <input type="text" class="input-hidden" name="id" value="<?php echo $filtro['id_producto']; ?>" />
                                    <button type="submit" class=" btn button-card view"><i class="fas fa-arrows-alt"></i></button>
                                </form>
                            </div>
                        <?php else : ?>
                            <p class="text-danger">No hay stock</p>
                            <div class="buttons">
                                <form method="POST" action="publicacion.php">
                                    <input type="text" class="input-hidden" name="id" value="<?php echo $filtro['id_producto']; ?>" />
                                    <button type="submit" class=" btn button-card view"><i class="fas fa-arrows-alt"></i></button>
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
</body>

</html>