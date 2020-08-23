<?php
session_start();
include('conexion.php');
$correo = $_POST['email'];
$pass = $_POST['password'];

$consulta=$pdo->prepare("SELECT * FROM usuarios WHERE email='$correo' and pass='$pass'");

$consulta->execute();

if($consulta->rowCount() > 0)
{
    echo '<div style="backgroundcolor:rgba(0,0,0,0.5);width:100vw;height:100vh;display:flex;flex-direction:row;justify-content:center;align-items:center;">
    <div></div>Inicio de sesion correctamente</div>
    </div>
    <script>
	
	window.location.href="../index.php";
	</script>';
	session_start();
	$_SESSION['email'] = $correo;
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