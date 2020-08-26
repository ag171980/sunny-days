<?php 
session_start();
include 'conexion.php';
$email = $_POST['email'];
$asunto = $_POST['asunto'];
$mensaje = $_POST['mensaje'];

$insertar = $pdo->prepare("INSERT INTO contacto (email,asunto,mensaje) VALUES ('$email','$asunto','$mensaje')");
$insertar->execute();

echo '
    <script>
	
	window.location.href="../contacto.php";
    </script>';
    ?>
