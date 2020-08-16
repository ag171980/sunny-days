<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/contactos.css">
    <title>Componente - Contacto</title>
</head>

<body>
    <article>
        <section class="container">
        <h2 class="text-center">Contacto</h2>
            <form class="formulario">
                
                <input type="email" class="formulario__input" name="email" id="email" required />

                <label for="email" class="formulario__label">Correo Electronico</label>

                <input type="password" class="formulario__input" name="pass" id="pass" required />

                <label for="pass" class="formulario__label">Contraseña</label>

                <button class="btn btn-primary btn-block">Enviar</button>
            </form>
        </section>
    </article>
</body>

</html>