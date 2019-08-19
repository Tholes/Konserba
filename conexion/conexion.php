<?php
$host = "localhost";
$user = "root";
$pass = "";
$DB = "proyecto";
$conn = mysqli_connect($host, $user, $pass) or die("Error al conectar a la DB ") ;
$db = mysqli_select_db( $conn, $DB ) or die("Error al conectar");
?>

