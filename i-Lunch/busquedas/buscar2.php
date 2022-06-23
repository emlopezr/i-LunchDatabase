<?php
require('../configuraciones/conexion.php');
$paginaActiva = 0;
include "../includes/header.php";

$n1 = $_POST["n1"];
$n2 = $_POST["n2"];
$query = "SELECT nit, nombre FROM(SELECT nit, nombre, numero_veces FROM (SELECT franquicia.nit, franquicia.nombre, COUNT(*) AS numero_veces FROM restaurante, franquicia WHERE restaurante.franquicia_duena = franquicia.nit GROUP BY franquicia.nit) AS T) AS T1 WHERE numero_veces BETWEEN '$n1' AND '$n2'";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
?>
<div class="mt-5">
    <div class="row">
        <!-- Separación. No es la forma más ortodoxa, pero sirve -->
        <div class="col-1 px2" style="width: 4.166666665%; flex: 0 0 4.166666665%; max-width: 4.166666665%;"></div>

        <div class="col-7 px-2">
            <!-- Tabla de restaurantes -->
            <table class="table border-rounded">
                <!-- Cabecera de la tabla -->
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">NIT</th>
                        <th scope="col">Nombre</th>
                    </tr>
                </thead>

                <!-- Cuerpo de la tabla -->
                <tbody>
                    <!-- Iterar sobre los restaurantes -->
                    <?php
                    if ($result) :
                        foreach ($result as $fila) :
                    ?>

                            <!-- Fila -->
                            <tr>
                                <!-- Columnas -->
                                <td><?= $fila["nit"]; ?></td>
                                <td><?= $fila["nombre"]; ?></td> 
                                

                            </tr>

                    <?php
                        endforeach;
                    endif;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>