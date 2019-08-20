<?php

require('../conexion/conexion.php');

if(isset($_GET['nombre'])) {
    $nombre = $_GET['nombre'];
    $query = "DELETE FROM hortaliza where nombre = '$nombre'";
    $result = mysqli_query($conn,$query);

    if(!$result){
        echo 'Hubo un error'
        . "<br><a href='./formhortaliza.php'>Volver</a>";
    }
    else{
        header("Location: formhortaliza.php");
    }
}   
?>