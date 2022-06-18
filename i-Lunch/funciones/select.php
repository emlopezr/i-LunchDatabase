<?php

function selectFunction($tabla, $condicion) {
    // Conexion con la BD
    require('../configuraciones/conexion.php');

    // Query SQL
    if (isset($condicion)){
        $query = "SELECT * FROM $tabla
                  WHERE $condicion";
    } else{
        $query = "SELECT * FROM $tabla";
    }

    // Ejecutar consulta
    $resultSelect = mysqli_query($conn, $query) or die(mysqli_error($conn));
    mysqli_close($conn);

    return $resultSelect;
}