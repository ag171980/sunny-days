<?php
include('conexion.php');
//Datos Personales
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['email'];
$Rcorreo = $_POST['remail'];
$pass = $_POST['password'];
$Rpass = $_POST['rpassword'];
//Informacion Adicional
$direccion = $_POST['direccion'];
$numero_piso = $_POST['numero'];
$telefono = $_POST['telefono'];
$codigo = $_POST['codigo'];

//Cifrado de contraseña
$pass_cifrada = password_hash($pass, PASSWORD_DEFAULT);

//chequeo si las clases coinciden
if ($correo == $Rcorreo && $pass == $Rpass) {
    $consulta = $pdo->prepare("INSERT INTO usuarios(nombre_usuario,apellido_usuario,direccion,codigo_postal,telefono,email,pass) VALUES ('$nombre','$apellido','$direccion.$numero_piso','$codigo','$telefono','$correo','$pass_cifrada')");

    $consulta1 = $pdo->prepare("SELECT * FROM usuarios WHERE email = '$correo'");
    $consulta1->execute();

    if (mysqli_num_rows($consulta1) > 0) {
        echo '<script>
        alert("El email ya se encuentra registrado...");
        window.history.go(-1);
        </script>';
        exit;
    }

    $consulta->execute();

    if ($consulta) {

        echo '<script>
    alert("Cuenta registrada correctamente...");
    window.location.href="../login.php";
    </script>';
    } else {
        echo '<script">
    alert("Error al registrar usuario...");
    window.history.go(-1);
    </script>';
    }
} else {
    echo '<script>
    alert("Hubo un error...");
    window.location.href="../registro.php";
    </script>';
}
