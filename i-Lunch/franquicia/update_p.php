<?php
 
// Create connection
require('../configuraciones/conexion.php');

//query
$query="UPDATE persona SET nombre='$_POST[nombre]',direccion='$_POST[direccion]',telefono='$_POST[telefono]' WHERE cedula='$_POST[cedula]'";
$result = mysqli_query($conn, $query) or 
die(mysqli_error($conn));
 
if($result){
    header ("Location: personas.php");
    
     
 }else{
     echo "Ha ocurrido un error al Eliminar  la persona";
 }
 
mysqli_close($conn);



?>