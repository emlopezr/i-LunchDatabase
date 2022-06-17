<?php
$paginaActiva = 2;
include "../includes/header.php"
?>

<div class="container mt-3">
    <div class="row">
        <?php
        if (isset($_GET["cedula"])) {
        ?>
            <div class="col-6 px-2">
                <div class="card">
                    <div class="card-header">
                        Editar Persona
                    </div>
                    <div class="card-body">
                        <!--formulario para insertar una persona mediante el metodo post-->
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
        <?php
        } else {
        ?>
            <div class="col-6 px-2">
                <div class="card">
                    <div class="card-header">
                        Insertar persona
                    </div>
                    <div class="card-body">
                        <!--formulario para insertar una persona mediante el metodo post-->
                        <form action="insert_p.php" class="form-group" method="post">
                            <div class="form-group">
                                <label for="cedula">Cedula</label>
                                <input type="text" name="cedula" id="cedula" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Nombre</label>
                                <input type="text" name="name" id="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Direccion</label>
                                <input type="text" name="direccion" id="direccion" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Telefono</label>
                                <input type="text" name="telefono" id="telefono" class="form-control">
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="insertar">
                                <a href="personas.php" class="btn btn-success">Reiniciar</a>
                            </div>


                        </form>

                    </div>
                </div>
            </div>

        <?php
        }
        ?>
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