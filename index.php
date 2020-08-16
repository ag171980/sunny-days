<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <!--Slick css -->
    <!--
    <link rel="stylesheet" href="css/slick/slick.css">
    <link rel="stylesheet" href="css/slick/slick-theme.css">
-->
    <link rel="stylesheet" href="css/style.css">

    <title> - Inicio - </title>
</head>

<body>
    <header>
        <?php include 'componentes/header.php'; ?>
    </header>
    <section>

        <article class="slider">
            <?php include 'componentes/slider.php'; ?>
        </article>
        <article>
            <h2><span>Oferta Semanal</span></h2>
            <div class="container-a1">
                <ul class="caption-style-1">
                    <li>
                        <img src="imagenes/foto.jpg" class="img" alt="">
                        <div class="caption">
                            <div class="blur"></div>
                            <div class="caption-text">
                                <h1>Amazing Caption</h1>
                                <p>Whatever It Is - Always Awesome</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <img src="imagenes/foto.jpg" class="img" alt="">
                        <div class="caption">
                            <div class="blur"></div>
                            <div class="caption-text">
                                <h1>Amazing Caption</h1>
                                <p>Whatever It Is - Always Awesome</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <img src="imagenes/foto.jpg" class="img" alt="">
                        <div class="caption">
                            <div class="blur"></div>
                            <div class="caption-text">
                                <h1>Amazing Caption</h1>
                                <p>Whatever It Is - Always Awesome</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

        </article>
    </section>
    <footer>
        <?php include 'componentes/footer.php'; ?>
    </footer>
    <!--Slick Slider-->
    <!--<script src="js/slick/slick.js"></script>-->

</body>

</html>