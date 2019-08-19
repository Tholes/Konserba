<?php

include("../conexion/conexion.php")

if(isset($_GET['nombre'])){
    $nombre = $_GET['nombre'];
    $query = "DELETE FROM hortaliza where id = $id";
    $result = mysqli_query($conn,$query);

    if(!$ejecutar){
        echo 'Hubo un error'
        . "<br><a href='./formhortaliza.php'>Volver</a>";
    }else{
        echo "Ingreso exitoso, puedes:"
        . "<br><a href='./formhortaliza.php'>Ingresar otro encargo</a>"
            ;
    }
}   
?>