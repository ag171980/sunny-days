<?php 
session_start();

include 'actions/conexion.php';
include 'actions/config.php';
$id=$_POST['id'];
$consulta = $pdo->prepare("SELECT * FROM productos WHERE id_producto = '$id'");
$consulta->execute();
$publicacion = $consulta->fetchAll(PDO::FETCH_ASSOC);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="imagenes/logo.ico" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/publicacion.css">
    <title>- Publicacion -</title>
</head>

<body>
    <header>
        <?php include 'componentes/header.php'; ?>
    </header>
    <article class="container">
        <section>
            <?php foreach($publicacion as $producto){ ?>
            <div class="left">
                <div class="imagen">
                    <img src="imagenes/<?php echo $producto['foto_producto']; ?>" class="img" alt="">
                </div>
            </div>
            <div class="right">
                <div class="information">
                    <h3 class="text-center"><?php echo $producto['nombre_producto']; ?></h3>
                    <p>Precio: $<?php echo $producto['precio_producto']; ?></p>
                    <p>Stock: <?php echo $producto['stock_producto']; ?></p>
                    <div id="accordion">
                        <div>
                            <div>
                                <h5 class="mb-0">
                                    <a class="btn btn-link info" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><i class="fas fa-plus"></i> Informacion sobre talles</a>
                                </h5>
                            </div>
                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body">
                                    <table>
                                        <thead>
                                            <tr>
                                                <td>Talle </td>
                                                <td>cm</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>35</td>
                                                <td>22.8cm</td>
                                            </tr>
                                            <tr>
                                                <td>36</td>
                                                <td>23.5cm</td>
                                            </tr>
                                            <tr>
                                                <td>37</td>
                                                <td>24.1cm</td>
                                            </tr>
                                            <tr>
                                                <td>38</td>
                                                <td>25cm</td>
                                            </tr>
                                            <tr>
                                                <td>39</td>
                                                <td>25.5cm</td>
                                            </tr>
                                            <tr>
                                                <td>40</td>
                                                <td>26cm</td>
                                            </tr>
                                            <tr>
                                                <td>41</td>
                                                <td>26.5cm</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Talles: </label>
                    <select class="form-control select" id="exampleFormControlSelect1">
                        <option>35</option>
                        <option>36</option>
                        <option>37</option>
                        <option>38</option>
                        <option>39</option>
                    </select>
                </div>
                <div class="buttons">
                    <button class="btn btn-primary btn-block"><i class="fas fa-shopping-bag"></i>Comprar</button>
                    <button class="btn btn-success btn-block"><i class="fas fa-shopping-cart"></i>Agregar al carrito</button>
                </div>
            </div>
            <?php } ?>
        </section>
    </article>
    <footer>
        <?php include 'componentes/footer.php'; ?>
    </footer>
</body>

</html>