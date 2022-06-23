<?php
$paginaActiva = 0;
include "../includes/header.php";

// Conexion con la BD
require('../configuraciones/conexion.php');

// Query SQL

// CostoTotal = Suma del costo de todos los restaurantes asociados a una franquicia
// Mostrar solo el NIT y nombre de las franquicias
// CostoTotal > 500
// Franquicia es dueña de mas de 2 restaurantes
// El administrador que gestiona la franquicia no gestiona ningun restaurante

$query = "SELECT nit, nombre FROM franquicia AS f
          WHERE ((SELECT SUM(costo_restaurante) FROM restaurante AS r WHERE r.franquicia_duena = f.nit) > 500) AND
                ((SELECT COUNT(nit) FROM restaurante as r WHERE r.franquicia_duena = f.nit GROUP BY(r.franquicia_duena)) > 2) AND
                EXISTS (SELECT tipo_id, numero_id FROM administrador AS a
                        WHERE (a.tipo_id = f.administrador_tipo_id AND a.numero_id = f.administrador_numero_id) AND
                        NOT EXISTS(SELECT administrador_tipo_id, administrador_numero_id FROM restaurante as r
                                   WHERE r.administrador_tipo_id = a.tipo_id AND r.administrador_numero_id = a.numero_id))";

// Ejecutar consulta
$resultConsulta1 = mysqli_query($conn, $query) or die(mysqli_error($conn));
mysqli_close($conn);

?>

<div class="mt-5">
    <div class="row">
        <div class="col-1 px2"></div>

        <div class="col-4 px-2">
            <h2>Consulta 1</h2>
            <p class="text-justify">Sea CostoTotal la suma de todos los costos de los restaurantes asociados a una franquicia. Se muestra el NIT y el nombre de las franquicias las cuales su CostoTotal es mayor a 500, la franquicia es dueña de mas de 2 restaurantes y el administrador que gestiona la franquicia no gestiona ningun restaurante.</p>
            <a href="../index.php" class="btn btn-primary">Regresar a la pagina principal</a>
        </div>

        <div class="col-6 px2">
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