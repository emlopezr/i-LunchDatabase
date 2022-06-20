<?php
 
// Conexion con la BD
require('../configuraciones/conexion.php');

$tipo_id = $_POST["tipo_id"];
$numero_id = $_POST["numero_id"];
$nombres = $_POST["nombres"];
$apellidos = $_POST["apellidos"];
$correo = $_POST["correo"];
$telefono = $_POST["telefono"];

// Query SQL

$query = "INSERT INTO `administrador`(`tipo_id`,`numero_id`, `nombres`, `apellidos`, `correo`, `telefono`) VALUES ('$tipo_id', '$numero_id', '$nombres', '$apellidos', '$correo', '$telefono')";

// Ejecutar consulta
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

// Redirigir al usuario a la misma pagina
if($result):
	header ("Location: administrador.php");
else:
	echo "Ha ocurrido un error al crear la persona";
endif;