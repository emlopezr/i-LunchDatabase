<?php
$paginaActiva = 3;
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
                    <b>Crear un restaurante</b>
                </div>

                <!-- Cuerpo del contenedor -->
                <div class="card-body">
                    <!-- Formulario de inserción de datos -->
                    <form action="insert_restaurante.php" class="form-group" method="post">

                        <!-- Campos necesarios -->
                        <div class="form-group">
                            <label for="nit">NIT</label>
                            <input type="number" name="nit" id="nit" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="pais">Pais</label>
                            <input type="text" name="pais" id="pais" class="form-control">
                        </div>

                        
                        <div class="form-group">
                            <label for="ciudad">Ciudad</label>
                            <input type="text" name="ciudad" id="ciudad" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label for="direccion">Direccion</label>
                            <input type="text" name="direccion" id="direccion" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="correo">Correo</label>
                            <input type="email" name="correo" id="correo" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label for="fecha_apertura">Fecha de apertura</label>
                            <input type="date" name="fecha_apertura" id="fecha_apertura" class="form-control">
                        </div>
                        
                        <div name="taskOption" class="form-group">
                            <label for="abierto">Estado del restaurante</label>
                            <select class="form-control" onchange="cambioTipo(this)" name="abierto" id="abierto">
                                <option value="1"> Abierto</option>
                                <option value="0"> Cerrado</option>

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="admin">Administradores disponibles</label>
                            <select name="admin" id="admin" class="form-control">
                                <!-- Si se deja esta, se inserta un NULL -->
                                <option value="NULL" selected>
                                    Ninguna
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
                            <label for="valoracion_comercial">Valoracion comercial del restaurante</label>
                            <input type="number" name="valoracion_comercial" id="valoracion_comercial" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="franquicia_duena">Franquicia dueña</label>
                            <select name="franquicia_duena" id="franquicia_duena" class="form-control">

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

        <!-- Ver las franquicias ya creadas -->
        <div class="col-7 px-2">
            <!-- Tabla de franquicias -->
            <table class="table border-rounded">
                <!-- Cabecera de la tabla -->
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">NIT</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Pais</th>
                        <th scope="col">Ciudad</th>
                        <th scope="col">Direccion</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Fecha de apertura</th>
                        <th scope="col">Estado del restaurante</th>
                        <th scope="col">Administrador</th>
                        <th scope="col">Valoracion comercial</th>
                        <th scope="col">Franquicia dueña</th>
                        <th></th>
                    </tr>
                </thead>

                <!-- Cuerpo de la tabla -->
                <tbody>
                    <!-- Iterar sobre las franquicias -->
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
                                <td><?= $fila["pais"]; ?></td>
                                <td><?= $fila["ciudad"]; ?></td>
                                <td><?= $fila["direccion"]; ?></td>
                                <td><?= $fila["correo"]; ?></td>
                                <td><?= $fila["fecha_apertura"]; ?></td>
                                
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

                                <td><?= $fila["valoracion_comercial"]; ?> ★</td>
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