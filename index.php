<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="imagenes/logo.ico" />
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
    <div id="loader-container">
        <div class="loader"></div>
        <p id="numb">0%</p>
    </div>
    <header>
        <?php include 'componentes/header.php'; ?>
    </header>
    <div class="usuario">
        <a href="login.php">Inicia sesion </a><p>/</p><a href="registro.php">registrate</a>
    </div>
    <section>
        <article class="bg">
            <div class="slider-text">
                <p class="text-light text-center">Sunny Day</p>
            </div>
        </article>
        <article>
            <h2><span>Oferta Semanal</span></h2>
            <div class="container-a1">
                <ul class="offers">
                    <li>
                        <img src="imagenes/foto.jpg" class="img" alt="">
                        <div class="caption">
                            <div class="blur"></div>
                            <div class="information">
                                <h1>Pantubotas</h1>
                                <p>súper calentitas y livianas ideales para este invierno</p>
                                <div class="buttons">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-success"><i class="fas fa-shopping-cart"></i></button>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <img src="imagenes/foto4.jpg" class="img" alt="">
                        <div class="caption">
                            <div class="blur"></div>
                            <div class="information">
                                <h1>Zapatillas urbanas</h1>
                                <p>súper cancheras</p>
                                <div class="buttons">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter2">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-success"><i class="fas fa-shopping-cart"></i></button>
                                </div>

                            </div>
                        </div>
                    </li>
                    <li>
                        <img src="imagenes/foto5.jpg" class="img" alt="">
                        <div class="caption">
                            <div class="blur"></div>
                            <div class="information">
                                <h1>Botas de lluvia</h1>
                                <p>Que la lluvia no te frene
                                    Ponele color a los días de lluvia</p>
                                <div class="buttons">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter3">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-success"><i class="fas fa-shopping-cart"></i></button>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <!--one-->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <button type="button" class="close" style="position: absolute;top:10px;right:10px; color:red; background-color:black;" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div id="carouselExampleControls" style="width: 100%;margin:0;padding:0;" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="imagenes/foto.jpg" alt="First slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="imagenes/foto4.jpg" alt="Second slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="imagenes/foto5.jpg" alt="Third slide">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!--two-->
            <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <button type="button" class="close" style="position: absolute;top:10px;right:10px; color:red; background-color:black;" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <img src="imagenes/foto4.jpg" style="width: 100%;margin:0;padding:0;" class="img" alt="">
                    </div>
                </div>
            </div>
            <!--three-->
            <div class="modal fade" id="exampleModalCenter3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <button type="button" class="close" style="position: absolute;top:10px;right:10px; color:red; background-color:black;" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <img src="imagenes/foto5.jpg" style="width: 100%;margin:0;padding:0;" class="img" alt="">
                    </div>
                </div>
            </div>
        </article>
    </section>
    <footer>
        <?php include 'componentes/footer.php'; ?>
    </footer>
    <script src="js/main.js" type="text/javascript">
    </script>
    <!--Slick Slider-->
    <!--<script src="js/slick/slick.js"></script>-->

</body>

</html>