<?php
include('conexion.php');
$correo = $_POST['email'];
$pass = $_POST['password'];
$contador = 0;
$password = $pdo->prepare("SELECT pass FROM usuarios WHERE email='$correo'");
$password->execute();
$lista = $password->fetchAll(PDO::FETCH_ASSOC);
$pass_descifrada = '';
foreach($lista as $usuario){
    if(password_verify($pass,$usuario['pass'])){
        $contador++;
    }else{
        echo 'No hay registros.';
    }
}
//$consulta = $pdo->prepare("SELECT * FROM usuarios WHERE email='$correo' and pass='$pass_cifrada'");

//$consulta->execute();

if ($contador > 0) {
	echo '
    <script>
	
	window.location.href="../index.php";
	</script>';
	session_start();
	$_SESSION['email'] = $correo;
	//$_SESSION['pass'] = $pass;
	$id_usuario = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email ='$correo'");
	$id_usuario->execute();
	echo $id_usuario;
} else {
	echo '<script>
	alert("El usuario no se encuentra registrado o los datos son incorrectos ...");
	window.history.go(-1);
	</script>';
	header("location: ../login.php");
	exit;
}
