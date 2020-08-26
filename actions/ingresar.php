<?php
session_start();
include('conexion.php');
$correo = $_POST['email'];
$pass = $_POST['password'];
$consulta=$pdo->prepare("SELECT * FROM usuarios WHERE email='$correo' and pass='$pass'");

$consulta->execute();

if($consulta->rowCount() > 0)
{
    echo '
    <script>
	
	window.location.href="../index.php";
	</script>';
	session_start();
	$_SESSION['email'] = $correo;
	$_SESSION['pass'] = $pass;
	$id_usuario = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email ='$correo'");
	$id_usuario->execute();
	echo $id_usuario;
}
else
{
	echo '<script>
	alert("El usuario no se encuentra registrado o los datos son incorrectos ...");
	window.history.go(-1);
	</script>';
	header("location: ../login.php");
	exit;
}
?>