<?php
$paginaActiva = 0;
include "../includes/header.php";

// Conexion con la BD
require('../configuraciones/conexion.php');

// Query SQL

// CostoTotal suma costo de todos los restaurantes asociados a una franquicia
// Mostrar NIT y nombre de las franquicias
// CostoTotal > 500
// Franquicia es dueña de más de 2 restaurantes
// El administrador que gestiona la franquicia no gestiona ningún restaurante

$query = "SELECT nit, nombre FROM franquicia";

// Ejecutar consulta
$resultConsulta1 = mysqli_query($conn, $query) or die(mysqli_error($conn));
mysqli_close($conn);

?>

<div class="mt-5">
    <div class="row">
        <div class="col-1 px2"></div>

        <div class="col-10 px2">
            <!-- Tabla de resultados -->
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
                    <!-- Iterar sobre las franquicias -->
                    <?php
                    if ($resultConsulta1) :
                        foreach ($resultConsulta1 as $fila) :
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

<?php
include "../includes/footer.php";
?>