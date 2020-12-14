<?php
error_reporting(0);
session_start();

$cantidad = 0;
foreach ($_SESSION['carrito'] as $indice => $producto) {
    $cantidad++;
}
?>

<div class="usuario">
    <div class="user">
        <?php if (!isset($_SESSION['email'])) : ?>
            <a href="./login.php">Inicia sesion </a>
            <p> / </p><a href="./registro.php"> Registrate </a>
        <?php else : ?>
            <?php echo '<p>' . $_SESSION['email'] . '</p>'; ?><a href="actions/logout.php"> Salir</a>
        <?php endif; ?>
    </div>
    <div class="cart">
        <div class="icon">
            <i class="fas fa-shopping-cart"></i>
            <a href="carrito.php">Carrito</a>
        </div>
        <p>(<?php echo $cantidad; ?>)</p>
    </div>
</div>