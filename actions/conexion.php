<?php
$host = "localhost";
$root = "root";
$pass = "";
$bd = "sunnyday";

$servidor = 'mysql:dbname=' . $bd . ';host=' . $host . '.';

try {
    $pdo = new PDO($servidor, $root, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

    //echo "<script> alert('conectado!') </script>";
} catch (PDOException $e) {
    // echo "<script>alert('error...')</script>";

}
?>