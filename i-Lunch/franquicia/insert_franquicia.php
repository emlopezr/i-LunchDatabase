<?php
 
// Conexion con la BD
require('../configuraciones/conexion.php');

$nit = $_POST["nit"];
$nombre = $_POST["nombre"];
$correo = $_POST["correo"];
$telefono = $_POST["telefono"];
$costo_franquicia = $_POST["costo"];

// Dividir los dos valores del mismo input
$admin = explode('|', $_POST['admin']);
$administrador_tipo_id = $admin[0];
$administrador_numero_id = $admin[1];

// Query SQL
// Verificar si franquicia_duena es NULL o tiene valor

$query = "INSERT INTO `franquicia`(`nit`,`nombre`, `correo`, `telefono`, `costo_franquicia`, `administrador_tipo_id`, `administrador_numero_id`) VALUES ('$nit', '$nombre', '$correo', '$telefono', '$costo_franquicia', '$administrador_tipo_id', '$administrador_numero_id')";

// Ejecutar consulta
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

// Redirigir al usuario a la misma pagina
if($result):
	header ("Location: franquicia.php");
else:
	echo "Ha ocurrido un error al crear la persona";
endif;