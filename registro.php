<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="imagenes/logo.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/registro.css">
    <title>- Registro -</title>
</head>

<body>
    <header>
        <?php include 'componentes/header.php'; ?>
    </header>
    <article>
        <section class="container">
            <h2 class="text-center">Registro</h2>
            <form method="POST" class="formulario" action="actions/registrar.php">
                <label for="nombre" class="formulario__label">Nombre Completo</label>
                <input type="text" class="formulario__input" name="nombre" id="nombre" pattern="[a-zA-Z ]{2,254}" title="Admite mayusculas y minusculas. No admite numeros." />

                <label for="apellido" class="formulario__label">Apellido</label>
                <input type="text" class="formulario__input" name="apellido" id="apellido" pattern="[a-zA-Z ]{2,254}" title="Admite mayusculas y minusculas. No admite numeros" />

                <label for="email" class="formulario__label">Correo Electronico</label>
                <input type="email" class="formulario__input" name="email" id="email" />

                <label for="password" class="formulario__label">Contraseña</label>
                <input type="password" class="formulario__input" name="password" id="password" pattern="[a-zA-Z0-9 ]{6,254}" title="Debe ser de minimamente 6 caracteres" required />
                <button type="button" class="hide" onclick="mostrarContrasena();"><i class="far fa-eye" id="hide"></i></button>
                <button type="button" class="nohide" onclick="mostrarContrasena();"><i class="far fa-eye-slash" id="nohide"></i></button>

                <input type="submit" class="btn btn-primary btn-block" value="Enviar" />
            </form>
        </section>
        <section class="container">
            <img src="imagenes/image.svg" height="500" alt="">
        </section>
    </article>
    <footer>
        <?php include 'componentes/footer.php'; ?>
    </footer>
    <script src="js/validation.js"></script>
    <script src="function.js"></script>
</body>

</html>