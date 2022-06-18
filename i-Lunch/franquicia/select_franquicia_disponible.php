<?php
 
// Conexion con la BD
require('../configuraciones/conexion.php');

// Query SQL
$query = "SELECT * FROM franquicia
          WHERE nit NOT IN (SELECT franquicia_duena FROM restaurante WHERE franquicia_duena IS NOT NULL)";
$resultFranquiciaDisp = mysqli_query($conn, $query) or die(mysqli_error($conn));
mysqli_close($conn);