<?php
 
// Create connection
require('../configuraciones/conexion.php');

$cedula = $_POST["cedula"];

//query
if($cedula<0){
	echo "cedula debe ser positiva";
}

else{
	$query="INSERT INTO `persona`(`cedula`,`nombre`, `direccion`, `telefono`)
 	VALUES ('$_POST[cedula]','$_POST[name]','$_POST[direccion]','$_POST[telefono]')";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

 	if($result){
        header ("Location: personas.php");
        
         
 	}else{
 		echo "Ha ocurrido un error al crear la persona";
 	}


}

?>
