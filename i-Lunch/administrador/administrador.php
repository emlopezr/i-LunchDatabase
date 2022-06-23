<?php
$paginaActiva = 1;
include "../includes/header.php";
require "../funciones/select.php";
?>

<div class="mt-5">
    <div class="row">
        <div class="col-1 px2"></div>

        <!-- Recibir los datos e insertarlos en la BD-->
        <div class="col-3 px-2">
            <!-- Contenedor -->
            <div class="card">
                <!-- Titulo del contenedor -->
                <div class="card-header">
                    <b>Crear un Administrador</b>
                </div>

                <!-- Cuerpo del contenedor -->
                <div class="card-body">
                    <!-- Formulario de insercion de datos -->
                    <form action="insert_admin.php" class="form-group" method="post">

                        <!-- Campos necesarios -->
                        <div name="taskOption" class="form-group">
                            <label for="tipo_id">Tipo de documento</label>
                            <select class="form-control" onchange="" name="tipo id" id="tipo_id" required>
                                <option value="CC">CC</option>
                                <option value="CE">CE</option>
                                <option value="PS">PS</option>

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="numero_id">Numero de documento</label>
                            <input type="number" name="numero id" id="numero_id" class="form-control" min="0" max="999999999" required>
                        </div>

                        <div class="form-group">
                            <label for="nombres">Nombre(s)</label>
                            <input type="text" name="nombres" id="nombres" class="form-control" maxlength="50" required>
                        </div>

                        <div class="form-group">
                            <label for="">Apellidos</label>
                            <input type="text" name="apellidos" id="apellidos" class="form-control" maxlength="50" required>
                        </div>

                        <div class="form-group">
                            <label for="correo">Correo</label>
                            <input type="email" name="correo" id="correo" class="form-control" maxlength="50" required>
                        </div>

                        <div class="form-group">
                            <label for="telefono">Telefono</label>
                            <input type="number" name="telefono" id="correo" class="form-control"  min="0" max="999999999" required>
                        </div>

                        <!-- Boton de envio -->
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Crear">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Ver los administradores ya creadas -->
        <div class="col-7 px-2">
            <!-- Tabla de administradores -->
            <table class="table border-rounded">
                <!-- Cabecera de la tabla -->
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Documento</th>
                        <th scope="col">Nombre completo</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Telefono</th>
                        <th></th>
                    </tr>
                </thead>

                <!-- Cuerpo de la tabla -->
                <tbody>
                    <!-- Iterar sobre los administradores -->
                    <?php
                    require('select_admin.php');
                    if ($resultAdmin) :
                        foreach ($resultAdmin as $fila) :
                    ?>

                            <!-- Fila -->
                            <tr>
                                <!-- Columnas -->
                                <td><?= $fila["tipo_id"]; ?>: <?= $fila["numero_id"]; ?></td>
                                <td><?= $fila["nombres"]; ?> <?= $fila["apellidos"]; ?></td>
                                <td><?= $fila["correo"]; ?></td>
                                <td><?= $fila["telefono"]; ?></td>
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
include "../includes/footer.php"
?>