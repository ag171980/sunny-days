<?php
include('conexion.php');

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['email'];
$pass = $_POST['password'];

$consulta = $pdo->prepare("INSERT INTO usuarios(nombre_usuario,apellido_usuario,email,pass) VALUES ('$nombre','$apellido','$correo','$pass')");

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
    
if($consulta)
{
    
    echo '<script>
    alert("Cuenta registrada correctamente...");
    window.location.href="../login.php";
    </script>';
}else{
    echo '<script">
    alert("Error al registrar usuario...");
    window.history.go(-1);
    </script>';
}
?>
