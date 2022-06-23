<?php
require('../configuraciones/conexion.php');
$paginaActiva = 0;
include "../includes/header.php";

$n1 = $_POST["n1"];
$n2 = $_POST["n2"];

$correcto = False;

if ($n1 < $n2) {
    $correcto = True;
}

$query = "SELECT nit, nombre FROM(SELECT nit, nombre, numero_veces FROM (SELECT franquicia.nit, franquicia.nombre, COUNT(*) AS numero_veces FROM restaurante, franquicia WHERE restaurante.franquicia_duena = franquicia.nit GROUP BY franquicia.nit) AS T) AS T1 WHERE numero_veces BETWEEN '$n1' AND '$n2'";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
?>

<div class="mt-5">
    <div class="row">
        <div class="col-1 px2"></div>

        <div class="col-4 px-2">
            <h2>Busqueda 2</h2>
            <p class="text-justify">El usuario ingresa dos numeros enteros N1 y N2. Se cumple que 0 ≤ N1 < N2. Se muestra el NIT y el nombre de todas las franquicias que son dueñas de entre N1 y N2 restaurantes (Intervalo cerrado [N1, N2]).</p>
                    <a href="busqueda_2.php" class="btn btn-primary">Regresar a la pagina de la búsqueda</a>
        </div>

        <?php if ($correcto) : ?>
            <div class="col-6 px-2">
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
        <?php else : ?>
            <div class="col-6 px-2 alert alert-danger" role="alert">
                Hubo un error en la búsqueda. Recuerda que N1 < N2.
                <br>
                Por favor regresa a la pagina anterior y vuelve a intentarlo.
            </div>
        <?php endif; ?>
    </div>
</div>