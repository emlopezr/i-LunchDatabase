<?php
 
// Conexion con la BD
require('../configuraciones/conexion.php');

// Query SQL
$query = "SELECT nit, nombre, pais, ciudad, direccion, correo, DATE_FORMAT(fecha_apertura, '%d/%m/%Y') AS fecha_apertura, valoracion_comercial, abierto, franquicia_duena, administrador_tipo_id, administrador_numero_id, costo_restaurante FROM restaurante";

// Ejecutar consulta
$resultRestaurante = mysqli_query($conn, $query) or die(mysqli_error($conn));
mysqli_close($conn);