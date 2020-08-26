<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/usuario.css">
    <title>Document</title>
</head>
<body>
<div class="usuario">
        <?php if (!isset($_SESSION['email'])) : ?>
            <a class="text-light" href="./login.php">Inicia sesion  </a>
            <p class="text-light"> / </p><a class="text-light" href="./registro.php"> Registrate </a>
        <?php else : ?>
            <p><?php echo '<p class="text-light">Usuario: ' . $_SESSION['email']. '</p>'; ?><a class="text-light" href="actions/logout.php"> Salir</a></p>
        <?php endif; ?>
    </div>
</body>
</html>