<?php
 
// Conexion con la BD
require('../configuraciones/conexion.php');

$nit = $_POST["nit"];
$nombre = $_POST["nombre"];
$pais= $_POST["pais"];
$fecha_apertura= $_POST["fecha_apertura"];
$ciudad= $_POST["ciudad"];
$direccion= $_POST["direccion"];
$correo = $_POST["correo"];
$franquicia_duena = $_POST["franquicia_duena"];
$abierto = $_POST["abierto"];
$administrador_tipo_id = $_POST["administrador_tipo_id"];
$administrador_numero_id = $_POST["administrador_numero_id"];
$valoracion_comercial = $_POST["valoracion_comercial"];

// Dividir los dos valores del mismo input
$admin = explode('|', $_POST['admin']);
$administrador_tipo_id = $admin[0];
$administrador_numero_id = $admin[1];
// Query SQL
// Verificar si franquicia_duena es NULL o tiene valor
if($franquicia_duena != "NULL"){
    // verificar si tiene administrador
    if($administrador_tipo_id != "NULL"){
	  $query = "INSERT INTO `restaurante` (`nit`, `nombre`, `pais`, `fecha_apertura`, `ciudad`, `direccion`, `correo`, `franquicia_duena`, `abierto`, `administrador_tipo_id`, `valoracion_comercial`, `administrador_numero_id`) VALUES ('$nit', '$nombre', '$pais', '$fecha_apertura', '$ciudad', '$direccion', '$correo', '$franquicia_duena', '$abierto', '$administrador_tipo_id', '$valoracion_comercial', '$administrador_numero_id')";
    }
    else{
      $query = "INSERT INTO `restaurante` (`nit`, `nombre`, `pais`, `fecha_apertura`, `ciudad`, `direccion`, `correo`, `franquicia_duena`, `abierto`, `administrador_tipo_id`, `valoracion_comercial`, `administrador_numero_id`) VALUES ('$nit', '$nombre', '$pais', '$fecha_apertura', '$ciudad', '$direccion', '$correo', '$franquicia_duena', '$abierto', NULL, '$valoracion_comercial', NULL)";
    } 
} 
else{
    // verificar si tiene administrador
    if($administrador_tipo_id != "NULL"){
        $query = "INSERT INTO `restaurante` (`nit`, `nombre`, `pais`, `fecha_apertura`, `ciudad`, `direccion`, `correo`, `franquicia_duena`, `abierto`, `administrador_tipo_id`, `valoracion_comercial`, `administrador_numero_id`) VALUES ('$nit', '$nombre', '$pais', '$fecha_apertura', '$ciudad', '$direccion', '$correo', NULL, '$abierto', '$administrador_tipo_id', '$valoracion_comercial', '$administrador_numero_id')";
    }
    else{
        $query = "INSERT INTO `restaurante` (`nit`, `nombre`, `pais`, `fecha_apertura`, `ciudad`, `direccion`, `correo`, `franquicia_duena`, `abierto`, `administrador_tipo_id`, `valoracion_comercial`, `administrador_numero_id`) VALUES ('$nit', '$nombre', '$pais', '$fecha_apertura', '$ciudad', '$direccion', '$correo', NULL, '$abierto', NULL, '$valoracion_comercial', NULL)";
    }
}

// Ejecutar consulta
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

// Redirigir al usuario a la misma pagina
if($result):
	header ("Location: restaurante.php");
else:
	echo "Ha ocurrido un error al crear la persona";
endif;