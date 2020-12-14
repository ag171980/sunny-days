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
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">

    <title>- Registro -</title>
</head>

<body>
    <header>
        <?php include 'componentes/header.php'; ?>
    </header>
    <?php include 'componentes/usuario.php'; ?>
    <?php
    if (!isset($_SESSION['email'])) {
    ?>
        <article>
            <section class="container">
                <h2 class="text-center h2">Registrate</h2>
                <form class="formulario">
                    <h3>Datos Personales</h3>
                    <div class="contenedor-inputs">
                        <div class="input">
                            <label for="nombre" class="formulario__label">Nombre/s</label>
                            <input type="text" class="formulario__input" name="nombre" id="nombre" pattern="[a-zA-Z ]{2,254}" value="" title="Admite mayusculas y minusculas. No admite numeros." />
                        </div>
                        <div class="input">
                            <label for="apellido" class="formulario__label">Apellido</label>
                            <input type="text" class="formulario__input" name="apellido" id="apellido" pattern="[a-zA-Z ]{2,254}" title="Admite mayusculas y minusculas. No admite numeros" />
                        </div>
                        <div class="input">
                            <label for="email" class="formulario__label">Correo Electronico</label>
                            <input type="email" class="formulario__input" name="email" id="email" />
                        </div>
                        <div class="input">
                            <label for="remail" class="formulario__label"> Repetir Correo Electronico</label>
                            <input type="email" class="formulario__input" name="remail" id="remail" />
                        </div>
                        <div class="input">
                            <label for="password" class="formulario__label">Contraseña</label>
                            <input type="password" class="formulario__input" name="password" id="password" pattern="[a-zA-Z0-9 ]{6,254}" title="Debe ser de minimamente 6 caracteres" required />
                            <button type="button" class="hide" onclick="mostrarContrasena();"><i class="far fa-eye" id="hide"></i></button>
                            <button type="button" class="nohide" onclick="mostrarContrasena();"><i class="far fa-eye-slash" id="nohide"></i></button>
                        </div>
                        <div class="input">
                            <label for="rpassword" class="formulario__label">Repetir Contraseña</label>
                            <input type="password" class="formulario__input" name="rpassword" id="rpassword" pattern="[a-zA-Z0-9 ]{6,254}" title="Debe ser de minimamente 6 caracteres" required />
                            <button type="button" class="hide" onclick="mostrarContrasena();"><i class="far fa-eye" id="rhide"></i></button>
                            <button type="button" class="nohide" onclick="mostrarContrasena();"><i class="far fa-eye-slash" id="rnohide"></i></button>
                        </div>
                    </div>
                    <h3>Información adicional</h3>
                    <div class="contenedor-inputs">
                        <div class="input">
                            <label for="direccion" class="formulario__label">Direccion</label>
                            <input type="text" class="formulario__input" name="direccion" id="direccion" />
                        </div>
                        <div class="input">
                            <label for="numero" class="formulario__label">Numero y Piso</label>
                            <input type="text" class="formulario__input" name="numero" id="numero" />
                        </div>
                        <div class="input">
                            <label for="telefono" class="formulario__label">Teléfono/Celular</label>
                            <input type="number" class="formulario__input" name="telefono" id="telefono" />
                        </div>
                        <div class="input">
                            <label for="codigo" class="formulario__label"> Código Postal</label>
                            <input type="number" class="formulario__input" name="codigo" id="codigo" />
                        </div>
                    </div>
                    <input type="submit" class="formulario__button" id="enviar" value="Enviar" />
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
    <script src="js/registro.js"></script>
    <script src="js/menu-hamburguer.js"></script>

</body>

</html>