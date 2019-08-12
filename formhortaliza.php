<?php
require('conexion.php');

$nombre=$_POST['nombre'];
$costo_por_unidad=$_POST['costo_por_unidad'];
$tipo_de_cultivo=$_POST['tipo_de_cultivo'];

$ingresar="INSERT INTO Hortaliza VALUES ('$nombre','$tipo_de_cultivo','$costo_por_unidad')";

$ejecutar= mysqli_query($conn, $ingresar);

 if(!$ejecutar){
     echo 'Hubo un error';
 }else{
     echo "Ingreso exitoso, puedes:"
     . "<br><a href='formhortaliza.html'>Ingresar otra hortaliza</a>"
            ;
 }
?>