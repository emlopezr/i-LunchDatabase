<?php
 
// Conexion con la BD
require('../configuraciones/conexion.php');

// Query SQL
$query = "SELECT * FROM administrador
          WHERE CONCAT(tipo_id, numero_id) NOT IN (SELECT CONCAT(administrador.tipo_id, administrador_numero_id) FROM franquicia)";
$resultAdminDisponible = mysqli_query($conn, $query) or die(mysqli_error($conn));
mysqli_close($conn);