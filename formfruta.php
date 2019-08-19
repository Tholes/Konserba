<?php
require('conexion.php');

$nombre=$_POST['nombre'];
$calidad=$_POST['calidad'];
$costo_por_kilo=$_POST['costo_por_kilo'];

$ingresar="INSERT INTO Fruta VALUES ('$nombre','$calidad','$costo_por_kilo')";

$ejecutar= mysqli_query($conn, $ingresar);

 if(!$ejecutar){
     echo 'Hubo un error '
         ."<br><a href='formfruta.html'>Volver</a>";
 }else{
     echo "Ingreso exitoso, puedes:"
     ."<br><a href='formfruta.html'>Ingresar otra fruta</a>"
             ;
 }
?>
