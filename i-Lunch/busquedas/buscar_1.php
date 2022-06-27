<?php
require('../configuraciones/conexion.php');
$paginaActiva = 0;
include "../includes/header.php";

$f1 = $_POST["f1"];
$f2 = $_POST["f2"];
$nr = $_POST["nr"];

$correcto = False;

if (($f1 < $f2) && ($nr>=0)) {
    $correcto = True;
}

$query = "SELECT nombres, telefono FROM (SELECT administrador.numero_id, administrador.tipo_id, administrador.nombres, administrador.telefono, COUNT(*) AS numero_restaurantes FROM administrador, restaurante WHERE restaurante.administrador_numero_id = administrador.numero_id AND restaurante.administrador_tipo_id = administrador.tipo_id AND restaurante.fecha_apertura BETWEEN '$f1' AND '$f2' GROUP BY administrador.numero_id, administrador.tipo_id) AS A WHERE A.numero_restaurantes=$nr";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
?>

<div class="mt-5">
    <div class="row">
        <div class="col-1 px2"></div>

        <div class="col-4 px-2">
            <h2>Busqueda 2</h2>
            <p class="text-justify">El usuario ingresa dos fechas f1 y f2 (cada fecha con día, mes y año), f2 ≥ f1 y un número entero n, n ≥ 0. Se muestra la cédula y el telefono de todos los administradores que han sido gestores de exactamente n restaurantes que han abierto en dicho rango de fechas [f1, f2].</p>
                    <a href="busqueda_2.php" class="btn btn-primary">Regresar a la pagina de la búsqueda</a>
        </div>

        <?php if ($correcto) : ?>
            <div class="col-6 px-2">
                <!-- Tabla de restaurantes -->
                <table class="table border-rounded">
                    <!-- Cabecera de la tabla -->
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Telefono</th>
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
                                    <td><?= $fila["nombres"]; ?></td>
                                    <td><?= $fila["telefono"]; ?></td>


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