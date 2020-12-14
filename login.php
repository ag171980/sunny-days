<?php

session_start();

if (isset($_SESSION['id'])) {
    header('Location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="imagenes/logo.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/5b23b3e9e6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/usuario.css">
    <link rel="stylesheet" href="css/registro.css">
    <link rel="stylesheet" href="css/footer.css">
    <title>- Inicio Sesion -</title>
</head>

<body>
    <header>
        <?php include 'componentes/header.php'; ?>
    </header>
    <?php include 'componentes/usuario.php';
    if (!isset($_SESSION['email'])) {
    ?>
        <article>
            <section class="container">
                <h2 class="text-center h2">Ingresá</h2>
                <form method="POST" class="formulario" action="actions/ingresar.php">

                    <label for="email" class="formulario__label">Correo Electronico</label>
                    <input type="email" class="formulario__input" name="email" id="email" />

                    <label for="password" class="formulario__label">Contraseña</label>
                    <input type="password" class="formulario__input" name="password" id="password" pattern="[a-zA-Z0-9 ]{6,254}" title="Debe ser de minimamente 6 caracteres" required />
                    <button type="button" class="hide" onclick="mostrarContrasena();"><i class="far fa-eye" id="hide"></i></button>
                    <button type="button" class="nohide" onclick="mostrarContrasena();"><i class="far fa-eye-slash" id="nohide"></i></button>

                    <input type="submit" class="formulario__button" value="Enviar" />
                </form>
            </section>

        </article>
    <?php
    } else {
    ?>
        <div class="alerts">
            <div class="alert alert-success m-4">Usted no puede ver esto porque ya se encuentra logueado en este momento. <a href="index.php">Volver</a> </div>
        </div>
    <?php
    } ?>
    <footer>
        <?php include 'componentes/footer.php'; ?>
    </footer>
    <script src="js/formlabel.js"></script>
    <script src="js/menu-hamburguer.js"></script>
</body>

</html>