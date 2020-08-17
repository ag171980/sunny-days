<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/contactos.css">
    <title>Componente - Contacto</title>
</head>

<body>
    <article class="container">
        <section class="form">
            <h2 class="text-center">Contacto</h2>
            <form class="formulario">

                <input type="email" class="formulario__input" name="email" id="email" required />

                <label for="email" class="formulario__label">Correo Electronico</label>

                <input type="text" class="formulario__input" name="pass" id="pass" required />

                <label for="pass" class="formulario__label">Asunto</label>
                <textarea name="message" id="message" class="formulario__textarea" cols="38" rows="10" placeholder="Escriba su mensaje..."></textarea>

                <button class="btn btn-primary btn-block">Enviar</button>
            </form>
        </section>
        <section class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3283.4421461894312!2d-58.43731518423635!3d-34.61826536577612!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcca440ec19097%3A0x30b34282ae8fae18!2sParque%20Rivadavia!5e0!3m2!1ses-419!2sar!4v1597629989377!5m2!1ses-419!2sar" width="300" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </section>
    </article>
</body>

</html>