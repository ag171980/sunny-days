<?php
session_start();
error_reporting(0);
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
    <!-- CSS LINKS -->
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/usuario.css">
    <link rel="stylesheet" href="css/contactos.css">
    <link rel="stylesheet" href="css/footer.css">
    <!--CDN Font Awesome & Ajax-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/5b23b3e9e6.js" crossorigin="anonymous"></script>
    <title> - Contacto - </title>
</head>

<body>
    <header>
        <?php include 'componentes/header.php'; ?>
    </header>
    <?php include 'componentes/usuario.php'; ?>
    <article>
        <?php include 'componentes/contactos.php'; ?>
    </article>
    <footer>
        <?php include 'componentes/footer.php'; ?>
    </footer>
    <script src="js/formlabel.js"></script>
    <script src="js/menu-hamburguer.js"></script>
</body>

</html>