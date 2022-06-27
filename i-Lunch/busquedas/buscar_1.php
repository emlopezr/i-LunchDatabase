<?php
require('../configuraciones/conexion.php');
$paginaActiva = 0;
include "../includes/header.php";

$f1 = $_POST["f1"];
$f2 = $_POST["f2"];
$nr = $_POST["nr"];

$correcto = False;

if ((strtotime($f1) < strtotime($f2)) && ($nr>=0)) {
    $correcto = True;
}

$query = "SELECT nombres, telefono FROM (SELECT administrador.numero_id, administrador.tipo_id, administrador.nombres, administrador.telefono, COUNT(*) AS numero_restaurantes FROM administrador, restaurante WHERE restaurante.administrador_numero_id = administrador.numero_id AND restaurante.administrador_tipo_id = administrador.tipo_id AND restaurante.fecha_apertura BETWEEN '$f1' AND '$f2' GROUP BY administrador.numero_id, administrador.tipo_id) AS A WHERE A.numero_restaurantes=$nr";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
?>

<div class="mt-5">
    <div class="row">
        <div class="col-1 px2"></div>

        <div class="col-4 px-2">
            <h2>Busqueda 1</h2>
            <p class="text-justify">El usuario ingresa dos fechas F1 y F2 y un número entero N. Se cumple que F1 ≤ F2 y 0 ≤ N. Se muestran los nombres y el telefono de todos los administradores que son gestores de exactamente N restaurantes y dichos restaurantes han abierto el rango de fechas [F1, F2].</p>
            <a href="busqueda_1.php" class="btn btn-primary">Regresar a la pagina de la búsqueda</a>
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
                Hubo un error en la búsqueda. Recuerda que F1 ≤ F2 y 0 ≤ N.
                <br>
                Por favor regresa a la pagina anterior y vuelve a intentarlo.
            </div>
        <?php endif; ?>
    </div>
</div>