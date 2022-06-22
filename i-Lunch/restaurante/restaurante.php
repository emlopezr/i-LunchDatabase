<?php
$paginaActiva = 3;
include "../includes/header.php";
require "../funciones/select.php";
?>

<div class="mt-5">
    <div class="row">
        <!-- Separación. No es la forma más ortodoxa, pero sirve -->
        <div class="col-1 px2" style="width: 4.166666665%; flex: 0 0 4.166666665%; max-width: 4.166666665%;"></div>

        <!-- Recibir los datos e insertarlos en la BD-->
        <div class="col-3 px-2">
            <!-- Contenedor -->
            <div class="card">
                <!-- Título del contenedor -->
                <div class="card-header">
                    <b>Crear un Restaurante</b>
                </div>

                <!-- Cuerpo del contenedor -->
                <div class="card-body">
                    <!-- Formulario de inserción de datos -->
                    <form action="insert_restaurante.php" class="form-group" method="post">

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
                            <label for="pais">Pais</label>
                            <input type="text" name="pais" id="pais" class="form-control" maxlength="50" required>
                        </div>

                        
                        <div class="form-group">
                            <label for="ciudad">Ciudad</label>
                            <input type="text" name="ciudad" id="ciudad" class="form-control" maxlength="50" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="direccion">Direccion</label>
                            <input type="text" name="direccion" id="direccion" class="form-control" maxlength="50" required>
                        </div>

                        <div class="form-group">
                            <label for="correo">Correo</label>
                            <input type="email" name="correo" id="correo" class="form-control" maxlength="50" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="fecha_apertura">Fecha de apertura</label>
                            <input type="date" name="fecha_apertura" id="fecha_apertura" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="valoracion_comercial">Valoracion comercial del restaurante</label>
                            <input type="number" name="valoracion_comercial" id="valoracion_comercial" class="form-control" min="1" max="5" required>
                        </div>

                        <div class="form-group">
                            <label for="costo">Costo del restaurante [Millones de $USD]</label>
                            <input type="number" name="costo" id="costo" class="form-control" min="0" max=9999.99" step="0.01" required>
                        </div>
                        
                        <div name="taskOption" class="form-group">
                            <label for="abierto">Estado del restaurante</label>
                            <select class="form-control" onchange="cambioTipo(this)" name="abierto" id="abierto" required>
                                <option value="1"> Abierto</option>
                                <option value="0"> Cerrado</option>

                            </select>
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
                                require("../administrador/select_admin.php");
                                if ($resultAdmin) :
                                    foreach ($resultAdmin as $fila) :
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

                        <div class="form-group">
                            <label for="franquicia_duena">Franquicia dueña</label>
                            <select name="franquicia_duena" id="franquicia_duena" class="form-control" required>

                                <!-- Si se deja esta, se inserta un NULL -->
                                <option value="NULL" selected>
                                    Ninguna
                                </option>

                                <!-- Iterar sobre las franquicias ya creadas y ponerlas en el formulario -->
                                <?php
                                require("../franquicia/select_franquicia.php");
                                if ($resultFranquicia) :
                                    foreach ($resultFranquicia as $fila) :
                                ?>

                                        <option value=<?= $fila['nit']; ?>>
                                            <?= $fila['nombre']; ?> (NIT: <?= $fila['nit']; ?>)
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

        <!-- Ver los restaurantes ya creadas -->
        <div class="col-7 px-2">
            <!-- Tabla de restaurantes -->
            <table class="table border-rounded">
                <!-- Cabecera de la tabla -->
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">NIT</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Ubicación</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Fecha de apertura</th>
                        <th scope="col">Valoración comercial</th>
                        <th scope="col">Costo [$USD]</th>
                        <th scope="col">Estado del restaurante</th>
                        <th scope="col">Administrador</th>
                        <th scope="col">Franquicia dueña</th>
                        <th></th>
                    </tr>
                </thead>

                <!-- Cuerpo de la tabla -->
                <tbody>
                    <!-- Iterar sobre los restaurantes -->
                    <?php
                    require('select_restaurante.php');
                    if ($resultRestaurante) :
                        foreach ($resultRestaurante as $fila) :
                    ?>

                            <!-- Fila -->
                            <tr>
                                <!-- Columnas -->
                                <td><?= $fila["nit"]; ?></td>
                                <td><?= $fila["nombre"]; ?></td>
                                <td><?= $fila["ciudad"]; ?>, <?= $fila["pais"]; ?>. <?= $fila["direccion"]; ?></td>
                                <td><?= $fila["correo"]; ?></td>
                                <td><?= $fila["fecha_apertura"]; ?></td>
                                <td><?= $fila["valoracion_comercial"]; ?> ★</td>
                                <td>$<?= $fila["costo_restaurante"]; ?>M</td>
                                
                                <?php if($fila["abierto"] == 1):?>
                                    <td>Abierto</td>
                                <?php else:?>
                                    <td>Cerrado</td>
                                <?php endif;?>

                                <?php
                                if ($fila['administrador_numero_id'] != NULL) :
                                    $administradorFranquicia = selectFunction("administrador", "tipo_id = '" . $fila["administrador_tipo_id"] . "' AND " . " numero_id = " . $fila["administrador_numero_id"]);
                                    foreach ($administradorFranquicia as $filaAdmin) :
                                ?>
                                        <td><?= $filaAdmin["nombres"] . " " . $filaAdmin["apellidos"] ?> (<?= $filaAdmin["tipo_id"] . ": " . $filaAdmin["numero_id"]; ?>)</td>
                                    <?php
                                    endforeach;
                                else :
                                    ?>
                                    <td></td>
                                <?php
                                endif;
                                ?>

                                <!-- Buscar nombre de la franquicia dueña -->
                                <?php
                                if ($fila["franquicia_duena"] != NULL) :
                                    $franquiciaDuena = selectFunction("franquicia", "nit = " . $fila["franquicia_duena"]);
                                    foreach ($franquiciaDuena as $filaFranquicia) :
                                ?>
                                        <td><?= $filaFranquicia["nombre"]; ?> (NIT: <?= $filaFranquicia["nit"]; ?>)</td>
                                    <?php
                                    endforeach;
                                // Imprimir vacío si no hay franquicia dueña
                                else :
                                    ?>
                                    <td></td>
                                <?php
                                endif;
                                ?>

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