<?php
 
// Create connection
require('../configuraciones/conexion.php');

//query

if($_POST["exampleRadios2"]==="empresa"){
    $query="INSERT INTO factura(`codigo`, `fecha`, `valor`, `fecha_retorno`, `tipo`, `nit_E`) 
	VALUES('$_POST[codigo]','$_POST[fecha]','$_POST[valor]','$_POST[fechar]','$_POST[tipo]','$_POST[identificacion]')";
    
}
else{
	$query="INSERT INTO factura(codigo,fecha,valor,fecha_retorno,tipo,cedula_p)
 	VALUES('$_POST[codigo]','$_POST[fecha]','$_POST[valor]','$_POST[fechar]','$_POST[tipo]','$_POST[identificacion]')";
}
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

 	if($result){
        header ("Location: facturas.php");
        
         
 	}else{
 		echo "Ha ocurrido un error al crear la persona";
 	}



?>
