<?php
require('conexion.php');

$número_de_orden=$_POST['número_de_orden'];
$fecha=$_POST['fecha'];
$valor=$_POST['valor'];
$guia=$_POST['guía_en_la_que_se_incluye'];
$fruta=$_POST['fruta'];
$hortaliza=$_POST['hortaliza'];

$ingresar="INSERT INTO Encargo VALUES ('$número_de_orden','$fecha','$valor','$guia','$fruta','$hortaliza')";

$ejecutar= mysqli_query($conn, $ingresar);

 if(!$ejecutar){
     echo 'Hubo un error'
      . "<br><a href='encargo.php'>Volver</a>";
 }else{
     echo "Ingreso exitoso, puedes:"
     . "<br><a href='encargo.php'>Ingresar otro encargo</a>"
            ;
 }
?>
