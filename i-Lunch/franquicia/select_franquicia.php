<?php
 
// Conexion con la BD
require('../configuraciones/conexion.php');

// Query SQL
$query = "SELECT * FROM franquicia";
$resultFranquicia = mysqli_query($conn, $query) or die(mysqli_error($conn));
mysqli_close($conn);