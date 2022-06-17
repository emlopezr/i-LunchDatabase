<?php
$paginaActiva = 2;
include "../includes/header.php"
?>

<div class="container mt-3">
    <div class="row">

        <!-- Si se envió el formulario, instertarlo en la BD -->
        <!-- ! FALTA POR HACER -->
        <?php if (isset($_POST["nit"])): ?>

            <div class="col-6 px-2">
                <div class="card">
                    <div class="card-header">
                        Editar Persona
                    </div>
                    <div class="card-body">
                        <form action="update_p.php" class="form-group" method="post">
                            <div class="form-group">
                                <label for="cedula">Cedula</label>
                                <input type="text" readonly name="cedula" value=<?= $_GET["cedula"]; ?> id="cedula" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Nombre</label>
                                <input type="text" name="nombre" value='<?= $_GET["nombre"]; ?>' id="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Direccion</label>
                                <input type="text" name="direccion" value='<?= $_GET["direccion"]; ?>' id="direccion" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Telefono</label>
                                <input type="text" name="telefono" value=<?= $_GET["telefono"]; ?> id="telefono" class="form-control">
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Guardar">
                                <a href="personas.php" class="btn btn-danger">descartar</a>

                            </div>

                        </form>

                    </div>
                </div>
            </div>
        
        <!-- Si no se ha llenado el formulario, recibir los datos -->
        <?php else: ?>

            <div class="col-6 px-2">
                <div class="card">

                    <div class="card-header">
                        <b>Crear una Franquicia</b>
                    </div>

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
                                    <option value="" selected>
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

        <?php endif; ?>
        
        <!-- Ver las franquicias ya creadas -->
        <div class="col-6 px-2">

            <table class="table border-rounded">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Cedula</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Direccion</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Opciones</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require('select_p.php');
                    if ($result) {
                        foreach ($result as $fila) {
                    ?>
                            <tr>
                                <td><?= $fila['cedula']; ?></td>
                                <td><?= $fila['nombre']; ?></td>

                                <td><?= $fila['direccion']; ?></td>

                                <td><?= $fila['telefono']; ?></td>
                                <td>

                                    <form action="delete_p.php" method="POST">
                                        <input type="text" value=<?= $fila['cedula']; ?> hidden>
                                        <input type="text" name="d" value=<?= $fila['cedula']; ?> hidden>
                                        <button class="btn btn-danger" title="eliminar" type="submit"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                                <td class="mx-0 pr-2">
                                    <form action="personas.php" method="GET">

                                        <input type="text" name="cedula" value=<?= $fila['cedula']; ?> hidden>
                                        <input type="text" name="nombre" value='<?= $fila['nombre']; ?>' hidden>
                                        <input type="text" name="direccion" value='<?= $fila['direccion']; ?>' hidden>
                                        <input type="text" name="telefono" value=<?= $fila['telefono']; ?> hidden>

                                        <button class="btn btn-primary" title="editar" type="submit"><i class="far fa-edit"></i></button>
                                    </form>
                                </td>



                            </tr>
                    <?php

                        }
                    }

                    ?>
                </tbody>
            </table>

        </div>
    </div>


</div>

<?php
include "../includes/footer.php"
?>