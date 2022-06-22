<?php
$paginaActiva = 2;
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
                <!-- Título del contenedor -->
                <div class="card-header">
                    <b>Crear una Franquicia</b>
                </div>

                <!-- Cuerpo del contenedor -->
                <div class="card-body">
                    <!-- Formulario de inserción de datos -->
                    <form action="insert_franquicia.php" class="form-group" method="post">

                        <!-- Campos necesarios -->
                        <div class="form-group">
                            <label for="nit">NIT</label>
                            <input type="number" name="nit" id="nit" class="form-control" min="0" max="999999999" required>
                        </div>

                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" maxlength="50" required>
                        </div>

                        <div class="form-group">
                            <label for="correo">Correo electrónico</label>
                            <input type="email" name="correo" id="correo" class="form-control" maxlength="50" required>
                        </div>

                        <div class="form-group">
                            <label for="telefono">Teléfono</label>
                            <input type="number" name="telefono" id="correo" class="form-control" min="0" max="999999999" required>
                        </div>

                        <div class="form-group">
                            <label for="costo">Costo de la franquicia [Millones de $USD]</label>
                            <input type="number" name="costo" id="costo" class="form-control" min="0" max=9999.99" step="0.01" required>
                        </div>

                        <div class="form-group">
                            <label for="valoracion_comercial">Valoracion comercial de la franquicia</label>
                            <input type="number" name="valoracion_comercial" id="valoracion_comercial" class="form-control" min="1" max="5" required>
                        </div>

                        <div class="form-group">
                            <label for="admin">Administrador</label>
                            <select name="admin" id="admin" class="form-control" required>
                                <!-- Si se deja esta, se inserta un NULL -->
                                <option value="NULL" selected>
                                    Ninguno
                                </option>

                                <!-- Iterar sobre los admins ya creadas pero sin franquicia y ponerlos en el formulario -->
                                <?php
                                require("../administrador/select_admin disponible.php");
                                if ($resultAdminDisponible) :
                                    foreach ($resultAdminDisponible as $fila) :
                                ?>

                                        <option value=<?= $fila['tipo_id'] . "|" . $fila['numero_id']; ?>>
                                            <!-- Se usa el delimitador | para mandar 2 valores -->
                                            <?= $fila['nombres'] . " " . $fila['apellidos']; ?> (<?= $fila['tipo_id'] . ": " . $fila['numero_id']; ?>)
                                        </option>

                                <?php
                                    endforeach;
                                endif;
                                ?>

                            </select>
                        </div>

                        <!-- Botón de envío -->
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Crear">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Ver las franquicias ya creadas -->
        <div class="col-7 px-2">
            <!-- Tabla de franquicias -->
            <table class="table border-rounded">
                <!-- Cabecera de la tabla -->
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">NIT</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Costo [$USD]</th>
                        <th scope="col">Valoración comercial</th>
                        <th scope="col">Administrador</th>
                    </tr>
                </thead>

                <!-- Cuerpo de la tabla -->
                <tbody>
                    <!-- Iterar sobre las franquicias -->
                    <?php
                    require('select_franquicia.php');
                    if ($resultFranquicia) :
                        foreach ($resultFranquicia as $fila) :
                    ?>

                            <!-- Fila -->
                            <tr>
                                <!-- Columnas -->
                                <td><?= $fila["nit"]; ?></td>
                                <td><?= $fila["nombre"]; ?></td>
                                <td><?= $fila["correo"]; ?></td>
                                <td><?= $fila["telefono"]; ?></td>
                                <td>$<?= $fila["costo_franquicia"]; ?>M</td>
                                <td><?= $fila["valoracion_comercial"]; ?> ★</td>

                                <?php if($fila["administrador_tipo_id"] != NULL): ?>
                                    <!-- Buscar nombre del administrador -->
                                    <?php
                                    $administradorFranquicia = selectFunction("administrador", "tipo_id = '" . $fila["administrador_tipo_id"] . "' AND " . " numero_id = " . $fila["administrador_numero_id"]);
                                    foreach ($administradorFranquicia as $filaAdmin) :
                                    ?>
                                        <td><?= $filaAdmin["nombres"] . " " . $filaAdmin["apellidos"] ?> (<?= $filaAdmin["tipo_id"] . ": " . $filaAdmin["numero_id"]; ?>)</td>
                                    <?php
                                    endforeach;
                                    ?>
                                <?php else: ?>
                                    <!-- Imprimir vacío si no hay admin -->
                                    <td></td>

                                <?php endif; ?>

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