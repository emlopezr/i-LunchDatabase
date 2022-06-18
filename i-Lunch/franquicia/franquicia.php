<?php
$paginaActiva = 2;
include "../includes/header.php";
require "../funciones/select.php";
?>

<div class="mt-5">
    <div class="row">
        <!-- Que me perdonen los dioses del desarollo web por esto que estoy a punto de hacer -->
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
                                <input type="number" name="nit" id="nit" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" name="nombre" id="nombre" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="correo">Correo electrónico</label>
                                <input type="email" name="correo" id="correo" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="telefono">Teléfono</label>
                                <input type="number" name="telefono" id="correo" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="costo">Costo de la franquicia</label>
                                <input type="number" name="costo" id="costo" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="franquicia">Franquicia dueña</label>
                                <select name="franquicia" id="franquicia" class="form-control">

                                    <!-- Si se deja esta, se inserta un NULL -->
                                    <option value="NULL" selected>
                                        Ninguna
                                    </option>

                                    <!-- Iterar sobre las franquicias ya creadas y ponerlas en el formulario -->
                                    <?php
                                    require("select_franquicia.php");
                                    if ($resultFranquicia):
                                        foreach ($resultFranquicia as $fila):
                                    ?>
                                    
                                    <option value=<?= $fila['nit'];?>>
                                        <?= $fila['nombre'];?> (NIT: <?= $fila['nit'];?>)
                                    </option>
                                    
                                    <?php
                                        endforeach;
                                    endif;
                                    ?>

                                </select>
                            </div>

                            <div class="form-group">
                                <label for="admin">Administradores disponibles</label>
                                <select name="admin" id="admin" class="form-control">
                                    
                                    <!-- Iterar sobre los admins ya creadas pero sin franquicia y ponerlos en el formulario -->
                                    <?php
                                    require("../administrador/select_admin disponible.php");
                                    if ($resultAdminDisponible):
                                        foreach ($resultAdminDisponible as $fila):
                                    ?>

                                    <option value=<?= $fila['tipo_id'] . "|" . $fila['numero_id'];?>> <!-- Se usa el delimitador | para mandar 2 valores -->
                                        <?= $fila['nombres'] . " " . $fila['apellidos'];?> (<?= $fila['tipo_id'] . ": " . $fila['numero_id'];?>)
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
                        <th scope="col">Franquicia dueña</th>
                        <th scope="col">Administrador</th>
                        <th></th>
                    </tr>
                </thead>

                <!-- Cuerpo de la tabla -->
                <tbody>
                    <!-- Iterar sobre las franquicias -->
                    <?php
                    require('select_franquicia.php');
                    if ($resultFranquicia):
                        foreach ($resultFranquicia as $fila):
                    ?>

                            <!-- Fila -->
                            <tr>
                                <!-- Columnas -->
                                <td><?= $fila["nit"];?></td>
                                <td><?= $fila["nombre"];?></td>
                                <td><?= $fila["correo"];?></td>
                                <td><?= $fila["telefono"];?></td>
                                <td>$<?= $fila["costo_franquicia"];?>M</td>

                                <!-- Buscar nombre de la franquicia dueña -->
                                <?php
                                if($fila["franquicia_duena"] != NULL):
                                    $franquiciaDuena = selectFunction("franquicia", "nit = " . $fila["franquicia_duena"]);
                                    foreach ($franquiciaDuena as $filaFranquicia):
                                ?>
                                    <td><?= $filaFranquicia["nombre"];?> (NIT: <?= $filaFranquicia["nit"];?>)</td>
                                <?php
                                    endforeach;
                                // Imprimir vacío si no hay franquicia dueña
                                else:
                                ?>
                                    <td></td>
                                <?php
                                endif;
                                ?>

                                <!-- Buscar nombre del administrador -->
                                <?php
                                $administradorFranquicia = selectFunction("administrador", "tipo_id = '" . $fila["administrador_tipo_id"] . "' AND " . " numero_id = " . $fila["administrador_numero_id"]);
                                foreach ($administradorFranquicia as $filaAdmin):
                                ?>
                                    <td><?= $filaAdmin["nombres"] . " " . $filaAdmin["apellidos"]?> (<?= $filaAdmin["tipo_id"] . ": ". $filaAdmin["numero_id"];?>)</td>
                                <?php
                                endforeach;
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