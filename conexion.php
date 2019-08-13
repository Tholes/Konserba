<?php
$host='localhost';
$user='root';
$password='';
$BDname='proyecto';
$conn = mysqli_connect('$host', '$user', '$password' , '$BDname') or 
        die("Error al conectar a la DB " . mysqli_error($link));
?>

