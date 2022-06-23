<?php
$paginaActiva = 0;
include "../includes/header.php";

// Conexion con la BD
require('../configuraciones/conexion.php');

// Query SQL

// Mostrar solo el NIT y valoracion comercial de los restaurantes
// Valoracion comercial restaurante > Valoracion comercial de la franquicia
// Administrador que gestiona el restaurante es el adminsitrador que gestiona la franquicia dueña 

$query = "SELECT nit, valoracion_comercial FROM restaurante AS r
          WHERE (r.valoracion_comercial > (SELECT f.valoracion_comercial FROM franquicia AS f WHERE f.nit = r.franquicia_duena)) AND
          (r.administrador_tipo_id = (SELECT f.administrador_tipo_id FROM franquicia AS f WHERE f.nit = r.franquicia_duena)) AND
          (r.administrador_numero_id = (SELECT f.administrador_numero_id FROM franquicia AS f WHERE f.nit = r.franquicia_duena))";

// Ejecutar consulta
$resultConsulta2 = mysqli_query($conn, $query) or die(mysqli_error($conn));
mysqli_close($conn);

?>

<div class="mt-5">
    <div class="row">
        <div class="col-1 px2"></div>

        <div class="col-4 px-2">
            <h2>Consulta 2</h2>
            <p class="text-justify">Se muestra el NIT y la valoracion comercial de los restaurantes los cuales su valoracion comercial es mayor a la valoracion comercial de su franquicia dueña y a su vez el administrador que gestiona el restaurante es el adminsitrador que gestiona la franquicia dueña.</p>
            <a href="../index.php" class="btn btn-primary">Regresar a la pagina principal</a>
        </div>

        <div class="col-6 px2">
            <!-- Tabla de resultados -->
            <table class="table border-rounded">
                <!-- Cabecera de la tabla -->
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">NIT</th>
                        <th scope="col">Valoracion comercial</th>
                    </tr>
                </thead>

                <!-- Cuerpo de la tabla -->
                <tbody>
                    <!-- Iterar sobre las franquicias -->
                    <?php
                    if ($resultConsulta2) :
                        foreach ($resultConsulta2 as $fila) :
                    ?>
                            <!-- Fila -->
                            <tr>
                                <!-- Columnas -->
                                <td><?= $fila["nit"]; ?></td>
                                <td><?= $fila["valoracion_comercial"]; ?> ★</td>
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