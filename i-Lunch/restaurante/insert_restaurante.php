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
$costo_restaurante = $_POST["costo"];
$valoracion_comercial = $_POST["valoracion_comercial"];

// Dividir los dos valores del mismo input
$admin = explode('|', $_POST['admin']);
$administrador_tipo_id = $admin[0];
$administrador_numero_id = $admin[1];

// Query SQL
// Verificar si franquicia_duena es NULL o tiene valor
if($franquicia_duena != "NULL"){
    // Si franquicia_duena, si admin
    if($administrador_tipo_id != "NULL"){
        $query = "INSERT INTO `restaurante`(`nit`,`nombre`, `pais`, `ciudad`, `direccion`, `correo`, `fecha_apertura`, `costo_restaurante`, `valoracion_comercial`, `abierto`, `franquicia_duena`, `administrador_tipo_id`, `administrador_numero_id`) VALUES ('$nit', '$nombre', '$pais', '$ciudad', '$direccion', '$correo', '$fecha_apertura', '$costo_restaurante', '$valoracion_comercial', '$abierto', '$franquicia_duena', '$administrador_tipo_id', '$administrador_numero_id')";
    }
    // Si franquicia_duena, no admin
    else if($administrador_tipo_id == "NULL"){
        $query = "INSERT INTO `restaurante`(`nit`,`nombre`, `pais`, `ciudad`, `direccion`, `correo`, `fecha_apertura`, `costo_restaurante`, `valoracion_comercial`, `abierto`, `franquicia_duena`, `administrador_tipo_id`, `administrador_numero_id`) VALUES ('$nit', '$nombre', '$pais', '$ciudad', '$direccion', '$correo', '$fecha_apertura', '$costo_restaurante', '$valoracion_comercial', '$abierto', '$franquicia_duena', NULL, NULL)";
    }
}
else{
    // No franquicia_duena, si admin
    if($administrador_tipo_id != "NULL"){
        $query = "INSERT INTO `restaurante`(`nit`,`nombre`, `pais`, `ciudad`, `direccion`, `correo`, `fecha_apertura`, `costo_restaurante`, `valoracion_comercial`, `abierto`, `franquicia_duena`, `administrador_tipo_id`, `administrador_numero_id`) VALUES ('$nit', '$nombre', '$pais', '$ciudad', '$direccion', '$correo', '$fecha_apertura', '$costo_restaurante', '$valoracion_comercial', '$abierto', NULL, '$administrador_tipo_id', '$administrador_numero_id')";
    }
    // No franquicia_duena, no admin
    else{
        $query = "INSERT INTO `restaurante`(`nit`,`nombre`, `pais`, `ciudad`, `direccion`, `correo`, `fecha_apertura`, `costo_restaurante`, `valoracion_comercial`, `abierto`, `franquicia_duena`, `administrador_tipo_id`, `administrador_numero_id`) VALUES ('$nit', '$nombre', '$pais', '$ciudad', '$direccion', '$correo', '$fecha_apertura', '$costo_restaurante', '$valoracion_comercial', '$abierto', NULL, NULL, NULL)";
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